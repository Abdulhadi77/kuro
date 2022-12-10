require('./bootstrap');

//get balance
var web3 = new Web3(window.ethereum);
let tokenAddress = "0xA6fB39D69b09ECdc1a8b5f829DF11a40B7742603";
let walletAddress = "user_address";
let minABI = "read JSON from ABI.json file";
let contract = new web3.eth.Contract(minABI,tokenAddress);
async function getBalance() {
    balance = await contract.methods.balanceOf(walletAddress).call();
    return balance;
  }
  getBalance().then(function (result) {
    console.log(result);
});


import Web3 from 'web3/dist/web3.min.js'
window.Web3 = Web3;

document.onreadystatechange = () => {
    const metaMaskLoginButton = document.getElementById("metamask-login");
    if (metaMaskLoginButton != null) {
        metaMaskLoginButton.onclick = async (event) => {
            if (!window.ethereum) {
                console.error('Metamask not exist');
                return;
            }

            const web3 = new Web3(window.ethereum);
            
            var kuro_balance = await web3.eth.getBalance('0xA6fB39D69b09ECdc1a8b5f829DF11a40B7742603');

            const signatureUrl = metaMaskLoginButton.getAttribute("data-signature-url");
            const authenticateUrl = metaMaskLoginButton.getAttribute("data-authenticate-url");
            const redirectUrl = metaMaskLoginButton.getAttribute("data-redirect-url");

            const message = (await axios.get(signatureUrl)).data;
            const [ address ] = await web3.eth.requestAccounts();

            const signature = await web3.eth.personal.sign(message, address);

            try {
                const { status } = await axios.post(authenticateUrl, {
                    'address': address,
                    'signature': signature,
                });
                if (status == 200) {
                    window.location = redirectUrl;
                }
            } catch (e) {
                console.error(e);
            }
        }
    }
}