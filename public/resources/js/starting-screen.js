async function startingScreenInit(startingScreen){
    startingScreen = startingScreen.parentNode;
    let countdownElem = document.getElementById('countdown').children[0];
    console.log(startingScreen);

    await countdown(3, countdownElem);

    startingScreen.style.display = 'none';
}

/**
 * Compte à rebours de time à 0, affichant le temps restant dans l'element e
 * @param time sec
 * @param e element
 */
async function countdown(time, e)
{
    await setTimeout(function () {}, 5000);
}

function setDelay() {
    setTimeout(function(){
        console.log('oui');
    }, 1000);
}