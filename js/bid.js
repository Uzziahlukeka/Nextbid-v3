
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
  } 
  if (bidAmount <= currentPrice ) {
      alert('Please enter a valid bid amount that is greater than the price bid.');
      return;
  }

  // Update the current bid in the UI
  currentBidElement.textContent = `$${bidAmount.toFixed(2)}`;

  // Send the bid amount to the server
  const xhr = new XMLHttpRequest();
  xhr.open('POST', '/updateBid', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
          console.log('Bid updated successfully');
      }else{
        console.error('Failed to update bido');
      }
  };
  xhr.send('bid=' + bidAmount);

  // Clear the input field
  bidInputElement.value = '';
}
