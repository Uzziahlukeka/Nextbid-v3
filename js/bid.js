
//*********************************place a bid*******************************//
function bid(cardElement) {
    const currentBidElement = cardElement.querySelector('.current-bid');
    const currentBidPrice = cardElement.querySelector('.last-bid');
    const currentPrice = parseFloat(currentBidPrice.textContent.slice(1));
    const currentBid = parseFloat(currentBidElement.textContent.slice(1));
    const bidInputElement = cardElement.querySelector('.bid-input');
    const bidAmount = parseFloat(bidInputElement.value);
  
    if (isNaN(bidAmount) || bidAmount <= currentBid ) {
      alert('Please enter a valid bid amount that is greater than the current bid.');
      return;
    } if (currentBid || bidAmount <= currentPrice ) {
      alert('Please enter a valid bid amount that is greater than the price bid.');
      return;
    }
   
    currentBidElement.textContent = `$${bidAmount.toFixed(2)}`;
    const lastBidElement = cardElement.querySelector('.last-bid');

   bidInputElement.value = '';
}