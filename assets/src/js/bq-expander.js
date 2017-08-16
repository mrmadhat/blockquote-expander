"use strict";

//we want to get all blockquotes as an array instead of a nodelist
const blockquotes = [].slice.call(document.querySelectorAll('blockquote'));

//do the things we need to to each blockquote on the page
blockquotes.map(blockquote => {
  //we only want an expander to be added if it is taller than 200px
  if(blockquote.clientHeight > 200) {
    //add data-state closed to the blockquote
    blockquote.setAttribute('data-state','closed');
    //create a span that will hold our expand button
    const gradient = document.createElement("span");
    //give it the class .bqe-gradient to add a gradient background
    gradient.classList.add('bqe-gradient');
    
    //create the expander button
    const expander = document.createElement("span");
    //add .bqe-expander class for styling
    expander.classList.add('bqe-expander');
    //add a funky hand pointer
    expander.innerHTML = '&#x261f;';  
    //add our expander element into the gradient element and then
    //add the gradient element into the blockquote
    blockquote.appendChild(gradient).appendChild(expander);
  }
});

//get all the .bqe-expander elements as array
const allExpanders = [].slice.call(document.querySelectorAll('.bqe-expander'));
//add event listener to each element so we can toggle the data-state 
allExpanders.map(expander => {expander.addEventListener('click', expandBlockquote)});

function expandBlockquote() {
  //our button is nested in the gradient span
  //so we want the parent of the parent
  const parEl = this.parentElement.parentElement;
  //toggle our data state thanks to:
  //https://toddmotto.com/stop-toggling-classes-with-js-use-behaviour-driven-dom-manipulation-with-data-states/
  parEl.setAttribute('data-state', parEl.getAttribute('data-state') === 'open' ? 'closed' : 'open');
}