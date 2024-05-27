function openDiv(divId) {
    // Hide both divs
    document.getElementById('leftSide').style.display = 'none';
    document.getElementById('rightSide').style.display = 'none';
    
    // Show the clicked div
    document.getElementById(divId).style.display = 'block';
  }

