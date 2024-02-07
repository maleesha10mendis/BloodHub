const bloodHub = artifacts.require("./BloodHub.sol");

module.exports = function(deployer) {
  deployer.deploy(bloodHub).then(function(instance) {
    console.log('Contract deployed at:', instance.address);
  });
};