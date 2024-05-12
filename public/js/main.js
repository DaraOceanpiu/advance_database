const { Blockchain, Transaction } = require('./blockchain');
const EC = require('elliptic').ec;
const ec = new EC('secp256k1');
const myKey = ec.keyFromPrivate('f77ccb975e9a6c315026de48fd35e5299fb014296303b63eac4fe00f2f493ce7');
const myWalletAddress = myKey.getPublic('hex');
let savjeeCoin = new Blockchain();
//add
const tx1 = new Transaction(myWalletAddress, 'public key goes here', 10);
tx1.signTransaction(myKey);
savjeeCoin.addTransaction(tx1);

console.log('\n Starting the miner...');
savjeeCoin.minePendingTransactions(myWalletAddress);
console.log('\nBalance of xavier is', savjeeCoin.getBalanceOfAddress(myWalletAddress));
console.log('Is chain valid?', savjeeCoin.isChainValid());


