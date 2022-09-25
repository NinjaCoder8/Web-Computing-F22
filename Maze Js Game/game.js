window.onload = () => {
    const boundaries = document.querySelectorAll("#game div.boundary");
    
    const start = document.getElementById("start");
    const end = document.getElementById("end");
    const status = document.getElementById("status");
    const game = document.getElementById("game");

    let score = 0;
    let is_playing = 0;     //its used to determine if the game has started or not


    const failHandler = (e) => {
        if(is_playing){
            is_playing = 0;
            boundaries.forEach(b => b.classList.add("youlose"));
            score -= 10;
            status.innerText = `You lost! Score: ${score}`;

        }
    }

    const resetHandler = (e) => {
        score = 0;
        startHandler(e);
    }

    const startHandler = (e) => {
        is_playing = 1
        boundaries.forEach(b => b.classList.remove("youlose"));
        boundaries.forEach(b => b.addEventListener("mouseover", failHandler));
        status.innerText = "Enjoy the game!";
    }

    const endHandler = (e) => {
        if(is_playing){
            is_playing = 0;
            score += 5;
            status.innerText = `You won! Score: ${score}`;
        }
    }

    start.addEventListener("click", resetHandler);
    start.addEventListener("mouseover", startHandler);
    end.addEventListener("mouseover", endHandler);
    game.addEventListener("mouseleave", failHandler);

    failHandler(null);

}