let counter = 0;
function count(){
    counter++;
    document.querySelector('h1').textContent= counter;
    if(counter%10 === 0){
        alert(`the counter is now ${counter}`);
    }
}
document.addEventListener('DOMContentLoaded', function(){
    document.querySelector('button').onclick = count;
})
