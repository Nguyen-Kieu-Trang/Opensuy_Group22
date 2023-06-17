/* eslint-disable no-undef */
const Web3Project = artifacts.require('Web3Project')

module.exports = async (deployer) => {
  const accounts = await web3.eth.getAccounts()

  await deployer.deploy(Web3Project, 'Timeless NFTs', 'TNT', 10, accounts[1])
}
