// SPDX-License-Identifier: MIT
pragma solidity ^0.8.0;

contract BloodHub {

    enum UserRole { Admin, Organization, Donor, Hospital }

    struct Campaign {
        address organization;
        uint256 campaignID;
        bytes32 location;
        bytes32 date;
        bytes32 startTime;
        bytes32 endTime;
        uint256 organizationID;
        bool approved;
        mapping(address => bool) donors;
    }

    struct Appointment {
        uint256 appointmentID;
        uint256 campaignID;
        uint256 slotID;
        address donor;
        bool attended;
    }

    struct BloodStock {
        uint256 stockID;
        uint256 ownerID;
        bytes32 bloodGroup;
        uint256 units;
    }

    struct BloodTransferRequestByHospital {
        uint256 requestID;
        uint256 hospitalID;
        bytes32 bloodGroup;
        uint256 units;
    }

    struct BloodTransferByAdminOrg {
        uint256 transferID;
        uint256 receiverID;
        uint256 senderID;
        bytes32 bloodGroup;
        uint256 units;
    }

    struct CampaignSlots {
        uint256 slotID;
        uint256 campaignID;
        bytes32 slotData;
    }

    mapping(address => UserRole) public userRoles;
    uint256[] public campaignIDs;
    uint256[] public appointmentIDs;
    mapping(uint256 => Appointment) public appointments;
    mapping(uint256 => Campaign) public campaigns;
    mapping(address => uint256[]) public organizationCampaigns;
    mapping(uint256 => CampaignSlots[]) public campaignSlotsMap;

    event SlotCreated(uint256 indexed campaignID, uint256 slotID, bytes32 slotData);
    event SlotsDeleted(uint256 indexed campaignID);
    uint256 public nextRequestID;

    mapping(uint256 => BloodStock) public bloodStocks;
    mapping(uint256 => BloodTransferRequestByHospital) public transferRequestsByHospital;
    mapping(uint256 => BloodTransferByAdminOrg) public transfersByAdminOrg;
    mapping(uint256 => BloodStock[]) public bloodStocksByOwner;
    mapping(uint256 => bool) public transferRequestKeys;
    uint256[] public transferRequestKeyList;
    mapping(uint256 => bool) public transferKeys;
    uint256[] public transferKeyList;

    event CampaignCreated(address indexed organization, uint256 indexed campaignID);
    event CampaignApproved(address indexed admin, uint256 indexed campaignID);
    event UserRoleChanged(address indexed user, UserRole indexed newRole);
    event CampaignDeleted(address indexed organization, uint256 indexed campaignID);
    event AppointmentCreated(uint256 indexed appointmentID, uint256 indexed campaignID, address indexed donor, uint256 slotID);
    event AppointmentAttended(uint256 indexed appointmentID);

    modifier onlyRole(UserRole role) {
        require(userRoles[msg.sender] == role, "Unauthorized access");
        _;
    }

    function createCampaign(
        uint256 organizationID,
        uint256 campaignID,
        bytes32 location,
        bytes32 date,
        bytes32 startTime,
        bytes32 endTime
    ) external onlyRole(UserRole.Organization) {
        require(campaigns[campaignID].organization == address(0), "Campaign ID already exists");

        Campaign storage newCampaign = campaigns[campaignID];  
        newCampaign.organization = msg.sender;
        newCampaign.organizationID = organizationID;
        newCampaign.campaignID = campaignID;
        newCampaign.location = location;
        newCampaign.date = date;
        newCampaign.startTime = startTime;
        newCampaign.endTime = endTime;
        newCampaign.approved = false;

        campaignIDs.push(campaignID);
        organizationCampaigns[msg.sender].push(campaignID);

        emit CampaignCreated(msg.sender, campaignID);
    }

    function approveCampaign(uint256 campaignID) external onlyRole(UserRole.Admin) {
        Campaign storage campaign = campaigns[campaignID];
        require(campaign.organization != address(0), "Campaign not found");
        require(!campaign.approved, "Campaign already approved");

        emit CampaignApproved(msg.sender, campaignID);
        campaign.approved = true;
    }

    function getAllCampaignsForAnyone() external view returns (
        uint256[] memory _campaignIDs,
        address[] memory organizations,
        uint256[] memory organizationIDs,
        bytes32[] memory locations,
        bytes32[] memory dates,
        bytes32[] memory startTimes,
        bytes32[] memory endTimes,
        bool[] memory approvedStatus
    ) {
        uint256 totalCampaigns = campaignIDs.length;

        _campaignIDs = new uint256[](totalCampaigns);
        organizations = new address[](totalCampaigns);
        organizationIDs = new uint256[](totalCampaigns);
        locations = new bytes32[](totalCampaigns);
        dates = new bytes32[](totalCampaigns);
        startTimes = new bytes32[](totalCampaigns);
        endTimes = new bytes32[](totalCampaigns);
        approvedStatus = new bool[](totalCampaigns);

        for (uint256 i = 0; i < totalCampaigns; i++) {
            uint256 campaignID = campaignIDs[i];
            Campaign storage campaign = campaigns[campaignID];

            _campaignIDs[i] = campaign.campaignID;
            organizations[i] = campaign.organization;
            organizationIDs[i] = campaign.organizationID;
            locations[i] = campaign.location;
            dates[i] = campaign.date;
            startTimes[i] = campaign.startTime;
            endTimes[i] = campaign.endTime;
            approvedStatus[i] = campaign.approved;
        }

        return (_campaignIDs, organizations, organizationIDs, locations, dates, startTimes, endTimes, approvedStatus);
    }

    function deleteCampaign(uint256 campaignID) external onlyRole(UserRole.Organization) {
        Campaign storage campaign = campaigns[campaignID];
        require(campaign.organization == msg.sender, "Unauthorized campaign deletion");

        uint256[] storage organizationCampaignList = organizationCampaigns[msg.sender];
        for (uint256 i = 0; i < organizationCampaignList.length; i++) {
            if (organizationCampaignList[i] == campaignID) {
                organizationCampaignList[i] = organizationCampaignList[organizationCampaignList.length - 1];
                organizationCampaignList.pop();
                break;
            }
        }

        for (uint256 i = 0; i < campaignIDs.length; i++) {
            if (campaignIDs[i] == campaignID) {
                campaignIDs[i] = campaignIDs[campaignIDs.length - 1];
                campaignIDs.pop();
                break;
            }
        }

        delete campaigns[campaignID];

        emit CampaignDeleted(msg.sender, campaignID);
    }

    function createAppointment(uint256 appointmentID, uint256 campaignID, uint256 slotID) external onlyRole(UserRole.Donor) {
        require(appointments[appointmentID].donor == address(0), "Appointment ID already exists");

        Campaign storage campaign = campaigns[campaignID];

        require(campaign.organization != address(0), "Campaign not found");
        require(campaign.approved, "Campaign not approved");

        Appointment storage newAppointment = appointments[appointmentID];
        newAppointment.appointmentID = appointmentID;
        newAppointment.campaignID = campaignID;
        newAppointment.slotID = slotID;
        newAppointment.donor = msg.sender;
        newAppointment.attended = false;

        appointmentIDs.push(appointmentID);

        emit AppointmentCreated(appointmentID, campaignID, msg.sender, slotID);
    }

    function getAllAppointmentsForCampaign(uint256 campaignID) external view returns (
        uint256[] memory _campaignIDs,
        uint256[] memory _appointmentIDs,
        address[] memory donors,
        uint256[] memory slotIDs,
        bool[] memory attendedStatus
    ) {
        uint256 totalAppointments = appointmentIDs.length;

        _campaignIDs = new uint256[](totalAppointments);
        _appointmentIDs = new uint256[](totalAppointments);
        donors = new address[](totalAppointments);
        slotIDs = new uint256[](totalAppointments);
        attendedStatus = new bool[](totalAppointments);

        for (uint256 i = 0; i < totalAppointments; i++) {
            uint256 appointmentID = appointmentIDs[i];
            Appointment storage appointment = appointments[appointmentID];

            if (appointment.campaignID == campaignID) {
                _campaignIDs[i] = appointment.campaignID;
                _appointmentIDs[i] = appointment.appointmentID;
                donors[i] = appointment.donor;
                slotIDs[i] = appointment.slotID;
                attendedStatus[i] = appointment.attended;
            }
        }

        return (_campaignIDs, _appointmentIDs, donors, slotIDs, attendedStatus);
    }

    function deleteAppointment(uint256 appointmentID) external onlyRole(UserRole.Donor) {
        Appointment storage appointment = appointments[appointmentID];
        require(appointment.donor == msg.sender, "Unauthorized access");

        for (uint256 i = 0; i < appointmentIDs.length; i++) {
            if (appointmentIDs[i] == appointmentID) {
                appointmentIDs[i] = appointmentIDs[appointmentIDs.length - 1];
                appointmentIDs.pop();
                break;
            }
        }

        delete appointments[appointmentID];
    }

    function markAppointmentAttended(uint256 appointmentID) external onlyRole(UserRole.Organization) {
        Appointment storage appointment = appointments[appointmentID];

        require(appointment.donor != address(0), "Appointment not found");
        require(campaigns[appointment.campaignID].organization == msg.sender, "Unauthorized access");
        require(!appointment.attended, "Appointment already marked as attended");

        appointment.attended = true;

        emit AppointmentAttended(appointmentID);
    }




    // Function to set the role of a user
    function setUserRole(address user, UserRole newRole) external onlyRole(UserRole.Admin) {
        userRoles[user] = newRole;
        emit UserRoleChanged(user, newRole);
    }







    /////////////////////////////Blood stock Functions

        // Function to add blood stock
function addBloodStock(
        uint256 _stockID,
        uint256 _ownerID,
        bytes32 _bloodGroup,
        uint256 _units
    ) external {
        BloodStock memory newBloodStock = BloodStock(_stockID, _ownerID, _bloodGroup, _units);
        bloodStocksByOwner[_ownerID].push(newBloodStock);
    }

    // Function to make blood transfer requests by hospital
function makeTransferRequestByHospital(
        uint256 _requestID,
        uint256 _hospitalID,
        bytes32 _bloodGroup,
        uint256 _units
    ) external {
        transferRequestsByHospital[_requestID] = BloodTransferRequestByHospital(
            _requestID,
            _hospitalID,
            _bloodGroup,
            _units
        );

        // Mark the key as existing in transferRequestKeys
        transferRequestKeys[_requestID] = true;

        // Update the list of keys
        transferRequestKeyList.push(_requestID);
    }

    // Function for the admin organization to execute blood transfers
    function executeBloodTransferByAdminOrg(
        uint256 _transferID,
        uint256 _receiverID,
        uint256 _senderID,
        bytes32 _bloodGroup,
        uint256 _units
    ) external {
        transfersByAdminOrg[_transferID] = BloodTransferByAdminOrg(
            _transferID,
            _receiverID,
            _senderID,
            _bloodGroup,
            _units
        );

        // Mark the key as existing in transferKeys
        transferKeys[_transferID] = true;

        // Update the list of keys
        transferKeyList.push(_transferID);
    }

    // Function to get all blood stocks for a specific owner
    function getBloodStocksByOwner(uint256 _ownerID) external view returns (uint256[] memory, uint256[] memory, bytes32[] memory, uint256[] memory) {
        BloodStock[] storage stocks = bloodStocksByOwner[_ownerID];

        // Arrays to store individual properties
        uint256[] memory stockIDs = new uint256[](stocks.length);
        uint256[] memory ownerIDs = new uint256[](stocks.length);
        bytes32[] memory bloodGroups = new bytes32[](stocks.length);
        uint256[] memory units = new uint256[](stocks.length);

        // Extract data from the array of structs
        for (uint256 i = 0; i < stocks.length; i++) {
            stockIDs[i] = stocks[i].stockID;
            ownerIDs[i] = stocks[i].ownerID;
            bloodGroups[i] = stocks[i].bloodGroup;
            units[i] = stocks[i].units;
        }

        return (stockIDs, ownerIDs, bloodGroups, units);
    }

    //get all hospitals requests
    function getAllTransferRequestsByHospital() external view returns (uint256[] memory, uint256[] memory, bytes32[] memory, uint256[] memory) {
        // Arrays to store individual properties
        uint256[] memory requestIDs = new uint256[](transferRequestKeyList.length);
        uint256[] memory hospitalIDs = new uint256[](transferRequestKeyList.length);
        bytes32[] memory bloodGroups = new bytes32[](transferRequestKeyList.length);
        uint256[] memory units = new uint256[](transferRequestKeyList.length);

        // Iterate through the keys of the mapping
        for (uint256 i = 0; i < transferRequestKeyList.length; i++) {
            uint256 requestID = transferRequestKeyList[i];

            requestIDs[i] = requestID;
            hospitalIDs[i] = transferRequestsByHospital[requestID].hospitalID;
            bloodGroups[i] = transferRequestsByHospital[requestID].bloodGroup;
            units[i] = transferRequestsByHospital[requestID].units;
        }

        return (requestIDs, hospitalIDs, bloodGroups, units);
    }




    // Function to get all blood transfers for a specific sender
    function getTransfersBySender(uint256 _senderID) external view returns (uint256[] memory, uint256[] memory, uint256[] memory, bytes32[] memory, uint256[] memory) {
        // Arrays to store individual properties
        uint256[] memory transferIDs = new uint256[](transferKeyList.length);
        uint256[] memory receiverIDs = new uint256[](transferKeyList.length);
        uint256[] memory senderIDs = new uint256[](transferKeyList.length);
        bytes32[] memory bloodGroups = new bytes32[](transferKeyList.length);
        uint256[] memory units = new uint256[](transferKeyList.length);

        // Counter to keep track of the index in the arrays
        uint256 counter = 0;

        // Iterate through the keys of the mapping
        for (uint256 i = 0; i < transferKeyList.length; i++) {
            uint256 transferID = transferKeyList[i];

            if (transfersByAdminOrg[transferID].senderID == _senderID) {
                transferIDs[counter] = transferID;
                receiverIDs[counter] = transfersByAdminOrg[transferID].receiverID;
                senderIDs[counter] = transfersByAdminOrg[transferID].senderID;
                bloodGroups[counter] = transfersByAdminOrg[transferID].bloodGroup;
                units[counter] = transfersByAdminOrg[transferID].units;

                // Increment the counter
                counter++;
            }
        }

        return (transferIDs, receiverIDs, senderIDs, bloodGroups, units);
    }

    // Function to get all blood transfers for a specific receiver
    function getTransfersByReceiver(uint256 _receiverID) external view returns (uint256[] memory, uint256[] memory, uint256[] memory, bytes32[] memory, uint256[] memory) {
        // Arrays to store individual properties
        uint256[] memory transferIDs = new uint256[](transferKeyList.length);
        uint256[] memory receiverIDs = new uint256[](transferKeyList.length);
        uint256[] memory senderIDs = new uint256[](transferKeyList.length);
        bytes32[] memory bloodGroups = new bytes32[](transferKeyList.length);
        uint256[] memory units = new uint256[](transferKeyList.length);

        // Counter to keep track of the index in the arrays
        uint256 counter = 0;

        // Iterate through the keys of the mapping
        for (uint256 i = 0; i < transferKeyList.length; i++) {
            uint256 transferID = transferKeyList[i];

            if (transfersByAdminOrg[transferID].receiverID == _receiverID) {
                transferIDs[counter] = transferID;
                receiverIDs[counter] = transfersByAdminOrg[transferID].receiverID;
                senderIDs[counter] = transfersByAdminOrg[transferID].senderID;
                bloodGroups[counter] = transfersByAdminOrg[transferID].bloodGroup;
                units[counter] = transfersByAdminOrg[transferID].units;

                // Increment the counter
                counter++;
            }
        }

        return (transferIDs, receiverIDs, senderIDs, bloodGroups, units);
    }

    // Function to create a new campaign slot
function createSlot(uint256 _campaignID, uint256 _slotID, bytes32 _slotData) external {
    CampaignSlots memory newSlot = CampaignSlots({
        slotID: _slotID,
        campaignID: _campaignID,
        slotData: _slotData
    });

    campaignSlotsMap[_campaignID].push(newSlot);

    emit SlotCreated(_campaignID, _slotID, _slotData);
}

    // Function to get all campaign slots for a given campaign ID
function getAllCampaignSlotsByCampaignID(uint256 _campaignID) external view returns (uint256[] memory slotIDs, bytes32[] memory slotDataArray) {
    uint256 slotsCount = campaignSlotsMap[_campaignID].length;
    slotIDs = new uint256[](slotsCount);
    slotDataArray = new bytes32[](slotsCount);

    for (uint256 i = 0; i < slotsCount; i++) {
        slotIDs[i] = campaignSlotsMap[_campaignID][i].slotID;
        slotDataArray[i] = campaignSlotsMap[_campaignID][i].slotData;
    }

    return (slotIDs, slotDataArray);
}

        // Function to delete all slots with a specific campaignID
    function deleteSlots(uint256 _campaignID) external {
        uint256 slotsCount = campaignSlotsMap[_campaignID].length;

        // Delete each slot in reverse order to avoid index issues
        for (uint256 i = slotsCount; i > 0; i--) {
            delete campaignSlotsMap[_campaignID][i - 1];
        }

        emit SlotsDeleted(_campaignID);
    }
}
