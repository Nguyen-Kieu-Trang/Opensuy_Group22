### 0. Requirement

1. Clone out project via Github link:

```
git clone https://github.com/toanvuvv/NFT_Marketplace.git
cd NFT_Marketplace && yarn install
```

1. Connect to IPFS
- Create ipfs Infura project via link: https://www.infura.io/product/ipfs
- Create “.evn” file in the home folder of Project
- Enter your Own API key from Infuria

```
REACT_APP_INFURIA_PID=<INFURIA_API_KEY_HERE>
REACT_APP_INFURIA_API=<INFURIA_API_KEY_SECRET_HERE>
```

### 1. Create ETH testnet by Ganache

1.1 Install Truffle and Ganache

```
npm install -g truffle
npm install ganache --global
```

1.2 Run the Local Blockchain Network

```
ganache -d
```

- You will see the list of Account with Private key and Public Key
- Private key will use to import account to Metamask wallet

1.3 Import ganache network to metamask

Detail tutorial:

https://www.geeksforgeeks.org/how-to-set-up-ganche-with-metamask/

Add the local blockchain network in MetaMask by entering the RPC URL and Chain ID (Default Value: [HTTP://127.0.0.1:8545](http://127.0.0.1:8545/) and 1337 respectively).

### 2. Deploy SmartContract

- Open new terminal tab

``` 
truffle migrate -- reset 


```
Truffle will discard the existing deployment status and re-deploy all contracts from the beginning. It ensures that all contracts are deployed again, even if they were previously deployed.
```
truffle migrate 
```
This command will initiate the migration process, and Truffle will deploy any new or modified contracts to the designated blockchain network.
### 3. Run web

- Open new terminal tab

```
yarn start
```

- Open : [localhost:3000/](http://localhost:3000/) in your browser
