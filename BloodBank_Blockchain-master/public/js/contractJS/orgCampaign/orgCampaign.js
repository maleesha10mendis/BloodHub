document.addEventListener('DOMContentLoaded', async () => {

    try {
        // Connect to Ethereum node using MetaMask's ethereum object
        if (!window.ethereum) {
            console.error('No Ethereum browser extension detected');
            return;
        }

        window.web3 = new Web3(ethereum);
        // Request account access using ethereum.request
        await ethereum.request({ method: 'eth_requestAccounts' });

        // Load ABI from a separate file
        const abiResponse = await fetch('/contracts/bloodHub/BloodHub.json'); // Update with your contract ABI file
        const abiData = await abiResponse.json();

        if (abiData && abiData.abi) {
            const contractABI = abiData.abi;
            const contractAddress = '0x612F1cAfc4e4a7E974f25a9c8B393c98bD8b7918'; // Replace with your deployed contract address
            bloodHubContract = new web3.eth.Contract(contractABI, contractAddress);
        } else {
            console.error('ABI data or ABI not found in the JSON file.');
            return;
        }
    } catch (error) {
        console.error('Error initializing web3:', error);
        return;
    }

    // Function to create a campaign by organization
    window.createCampaign = async (organizationID,campaignID,location,date,startTime,endTime) => {
        try {
            // Check if an account is selected
            if (!ethereum.selectedAddress) {
                console.error('No Ethereum account selected. Please connect to MetaMask and select an account.');
                return;
            }

            // Convert string to bytes32
            const locationBytes32 = web3.utils.utf8ToHex(location);
            const dateBytes32 = web3.utils.utf8ToHex(date);
            const startTimeBytes32 = web3.utils.utf8ToHex(startTime);
            const endTimeBytes32 = web3.utils.utf8ToHex(endTime);
            // Call the smart contract function to create a campaign
            await bloodHubContract.methods.createCampaign(
                organizationID,
                campaignID,
                locationBytes32,
                dateBytes32,
                startTimeBytes32,
                endTimeBytes32
            ).send({ from: ethereum.selectedAddress });

            console.log('Campaign created successfully.');
        } catch (error) {
            console.error('Error creating campaign:', error);
        }
    };



    // Function to create a campaign by Org
    window.createSlot = async (_campaignID,slotID,_slotData) => {
        try {
            // Check if an account is selected
            if (!ethereum.selectedAddress) {
                console.error('No Ethereum account selected. Please connect to MetaMask and select an account.');
                return;
            }
            const slotDataBytes32 = web3.utils.utf8ToHex(_slotData);


            // Call the smart contract function to create a campaign
            await bloodHubContract.methods.createSlot(
                _campaignID,
                slotID,
                slotDataBytes32
            ).send({ from: ethereum.selectedAddress });

            console.log('Campaign slot created successfully.');
        } catch (error) {
            console.error('Error creating campaign slot:', error);
        }
    };


    // Function to get all campaigns
    window.getAllCampaigns = async () => {
        try {
            // Call the getAllCampaignsForAnyone function on the smart contract
            const result = await bloodHubContract.methods.getAllCampaignsForAnyone().call();
            return result;
        } catch (error) {
            console.error('Error getting campaigns:', error);
            // You may want to handle the error or return a specific value in case of an error
            throw error;
        }
    };


    // Function to get all campaignsSlots
    window.getAllCampaignSlotsByCampaignID = async (campaignID) => {
        try {
            // Call the getAllCampaignByCampaignID function on the smart contract
            const result = await bloodHubContract.methods.getAllCampaignSlotsByCampaignID(campaignID).call();
            return result;
        } catch (error) {
            console.error(`Error getting campaigns slots for campaign ID ${campaignID}:`, error);
            // You may want to handle the error or return a specific value in case of an error
            throw error;
        }
    };



    // Function to delete campaign by organization
    window.deleteCampaign = async (campaignID) => {
        try {
            // Check if an account is selected
            if (!ethereum.selectedAddress) {
                console.error('No Ethereum account selected. Please connect to MetaMask and select an account.');
                return;
            }

            // Call the setUserRole function on the smart contract
            await bloodHubContract.methods.deleteCampaign(campaignID).send({ from: ethereum.selectedAddress });

            console.log(`deleted campaignID ${campaignID}.`);
        } catch (error) {
            console.error('Error delete campaign:', error);
        }
    };


    // Function to delete slot by campaignID by Org
    window.deleteSlots = async (campaignID) => {
        try {
            // Check if an account is selected
            if (!ethereum.selectedAddress) {
                console.error('No Ethereum account selected. Please connect to MetaMask and select an account.');
                return;
            }

            // Call the setUserRole function on the smart contract
            await bloodHubContract.methods.deleteSlots(campaignID).send({ from: ethereum.selectedAddress });

            console.log(`deleted slot campaignID ${campaignID}.`);
        } catch (error) {
            console.error('Error delete campaign:', error);
        }
    };


    // Function to approve Campaign by admin
    window.approveCampaign = async (campaignID) => {
        try {
            // Check if an account is selected
            if (!ethereum.selectedAddress) {
                console.error('No Ethereum account selected. Please connect to MetaMask and select an account.');
                return;
            }

            // Call the setUserRole function on the smart contract
            await bloodHubContract.methods.approveCampaign(campaignID).send({ from: ethereum.selectedAddress });

            console.log(`approve campaignID ${campaignID}.`);
        } catch (error) {
            console.error('Error approving campaign:', error);
        }
    };

    //Function to make Appointment by Donor
    window.createAppointment = async (appointmentID,campaignID,slotID) => {
        try {
            // Check if an account is selected
            if (!ethereum.selectedAddress) {
                console.error('No Ethereum account selected. Please connect to MetaMask and select an account.');
                return;
            }

            // const slotDataBytes32 = web3.utils.utf8ToHex(_slotData);

            // Call the smart contract function to create a campaign
            await bloodHubContract.methods.createAppointment(
                appointmentID,
                campaignID,
                slotID
            ).send({ from: ethereum.selectedAddress,gas: 2000000, // Adjust the gas limit accordingly
                gasPrice: '5000000000' // Adjust the gas price accordingly
            });

            console.log('Campaign created successfully.');
        } catch (error) {
            console.error('Error creating createAppointment:', error);
        }
    };

    // Function to delete appointment by appointmentID by Donor
    window.deleteAppointment = async (appointmentID) => {
        try {
            // Check if an account is selected
            if (!ethereum.selectedAddress) {
                console.error('No Ethereum account selected. Please connect to MetaMask and select an account.');
                return;
            }

            // Call the setUserRole function on the smart contract
            await bloodHubContract.methods.deleteAppointment(appointmentID).send({ from: ethereum.selectedAddress });

            console.log(`deleted appointment ${appointmentID}.`);
        } catch (error) {
            console.error('Error delete appointment:', error);
        }
    };

    //Function to get all appointments for campaign
    window.getAllAppointmentsForCampaign = async (campaignID) => {
        try {
            // Call the getAllCampaignByCampaignID function on the smart contract
            const result = await bloodHubContract.methods.getAllAppointmentsForCampaign(campaignID).call();
            return result;
        } catch (error) {
            console.error(`Error getting campaigns slots for campaign ID ${campaignID}:`, error);
            // You may want to handle the error or return a specific value in case of an error
            throw error;
        }
    };

    // Function for organization to mark an appointment as attended
    window.markAppointmentAttended = async (appointmentID) => {
        try {
            // Check if an account is selected
            if (!ethereum.selectedAddress) {
                console.error('No Ethereum account selected. Please connect to MetaMask and select an account.');
                return;
            }

            // Call the setUserRole function on the smart contract
            await bloodHubContract.methods.markAppointmentAttended(appointmentID).send({ from: ethereum.selectedAddress });

            console.log(`approve donor appointment ${appointmentID}.`);
        } catch (error) {
            console.error('Error approving campaign:', error);
        }
    };



    //Function to add Blood
    window.addBloodStock = async (_stockID,_ownerID,_bloodGroup,_units) => {
        try {
            // Check if an account is selected
            if (!ethereum.selectedAddress) {
                console.error('No Ethereum account selected. Please connect to MetaMask and select an account.');
                return;
            }
                    // Convert string to bytes32
            const bloodGroupBytes32 = web3.utils.utf8ToHex(_bloodGroup);
            // Call the smart contract function to create a campaign
            await bloodHubContract.methods.addBloodStock(
                _stockID,
                _ownerID,
                bloodGroupBytes32,
                _units
            ).send({ from: ethereum.selectedAddress,gas: 2000000, // Adjust the gas limit accordingly
                gasPrice: '5000000000' // Adjust the gas price accordingly
            });

            console.log('Blood added successfully.');
        } catch (error) {
            console.error('Error blood adding:', error);
        }
    };


    // function getBloodStocksByOwner

    // Function to get blood stock by ownerID
    window.getBloodStocksByOwner = async (ownerID) => {
        try {
            // Call the getAllCampaignByCampaignID function on the smart contract
            const result = await bloodHubContract.methods.getBloodStocksByOwner(ownerID).call();
            return result;
        } catch (error) {
            console.error(`Error getting blood for owner ID ${ownerID}:`, error);
            // You may want to handle the error or return a specific value in case of an error
            throw error;
        }
    };



    //Function to request blood by hospital
    window.makeTransferRequestByHospital = async (_requestID,_hospitalID,_bloodGroup,_units) => {
        try {
            // Check if an account is selected
            if (!ethereum.selectedAddress) {
                console.error('No Ethereum account selected. Please connect to MetaMask and select an account.');
                return;
            }
            const bloodGroupBytes32 = web3.utils.utf8ToHex(_bloodGroup);

            // Call the smart contract function to create a campaign
            await bloodHubContract.methods.makeTransferRequestByHospital(
                _requestID,
                _hospitalID,
                bloodGroupBytes32,
                _units
            ).send({ from: ethereum.selectedAddress,gas: 2000000, // Adjust the gas limit accordingly
                gasPrice: '5000000000' // Adjust the gas price accordingly
            });

            console.log('Blood request by hospital added successfully.');
        } catch (error) {
            console.error('Error blood requesting:', error);
        }
    };


    // Function to get All requested blood by hospital
    window.getAllTransferRequestsByHospital = async () => {
        try {
            // Call the getAllCampaignByCampaignID function on the smart contract
            const result = await bloodHubContract.methods.getAllTransferRequestsByHospital().call();
            return result;
        } catch (error) {
            console.error(`Error getting requested blood by hospitals `, error);
            // You may want to handle the error or return a specific value in case of an error
            throw error;
        }
    };

    //Function to add transfer data by admin and org
    window.executeBloodTransferByAdminOrg = async (_transferID,_receiverID,_senderID,_bloodGroup,_units) => {
        try {
            // Check if an account is selected
            if (!ethereum.selectedAddress) {
                console.error('No Ethereum account selected. Please connect to MetaMask and select an account.');
                return;
            }

            // Convert string to bytes32
            const bloodGroupBytes32 = web3.utils.utf8ToHex(_bloodGroup);


            // Call the smart contract function to create a campaign
            await bloodHubContract.methods.executeBloodTransferByAdminOrg(
                _transferID,
                _receiverID,
                _senderID,
                bloodGroupBytes32,
                _units
            ).send({ from: ethereum.selectedAddress,gas: 2000000, // Adjust the gas limit accordingly
                gasPrice: '5000000000' // Adjust the gas price accordingly
            });

            console.log('Blood transfer by admin or Org successfully.');
        } catch (error) {
            console.error('Error blood transfer:', error);
        }
    };

    //Function to getTransfersBySender
    window.getTransfersBySender = async (_senderID) => {
        try {
            // Call the getAllCampaignByCampaignID function on the smart contract
            const result = await bloodHubContract.methods.getTransfersBySender(_senderID).call();
            return result;
        } catch (error) {
            console.error(`Error getting getTransfersBySender `, error);
            // You may want to handle the error or return a specific value in case of an error
            throw error;
        }
    };


    //Function to getTransfersByReceiver
    window.getTransfersByReceiver = async (_receiverID) => {
        try {
            // Call the getAllCampaignByCampaignID function on the smart contract
            const result = await bloodHubContract.methods.getTransfersByReceiver(_receiverID).call();
            return result;
        } catch (error) {
            console.error(`Error getting getTransfersByReceiver `, error);
            // You may want to handle the error or return a specific value in case of an error
            throw error;
        }
    };

    // Function to set user role
    window.setUserRole = async (userAddress, newRole) => {
        try {
            // Check if an account is selected
            if (!ethereum.selectedAddress) {
                console.error('No Ethereum account selected. Please connect to MetaMask and select an account.');
                return;
            }

            // Call the setUserRole function on the smart contract
            await bloodHubContract.methods.setUserRole(userAddress, newRole).send({ from: ethereum.selectedAddress });

            console.log(`User role set successfully for ${userAddress}.`);
        } catch (error) {
            console.error('Error setting user role:', error);
        }
    };




});
