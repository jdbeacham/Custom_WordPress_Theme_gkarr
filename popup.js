function gkarr_onclick() {

    document.cookie = "popped=yes";

    let gkarr_pop_container = document.getElementById('gkarr_pop_container');
    gkarr_pop_container.style.display = "none";

    let pause = document.getElementById('iframe');
    pause.src="https://www.youtube.com/embed/DAqqmv4arW8";
};