<!-- Core JS -->
<script src="./assets/vendor/libs/popper/popper.js"></script>
  <script src="./assets/vendor/js/bootstrap.js"></script>
  <script src="./assets/vendor/libs/node-waves/node-waves.js"></script>
  <script src="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="./assets/vendor/libs/hammer/hammer.js"></script>
  <script src="./assets/vendor/js/menu.js<?=cache($hakibavuong)?>"></script>
  <script src="./assets/js/main.js<?=cache($hakibavuong)?>"></script>
  <script>
  function showToastrNotification(status, message, title) {
    var toastrType = status === "success" ? "success" : "error";
    toastr.options = {
      positionClass: 'toast-top-right', 
      closeButton: true,
      progressBar: true,
    };
    toastr[toastrType](message, title);
  }
</script>
<script>
       let autoPlayInterval;
let hasPlayed = false;
let autoPlayEnabled = true;

document.addEventListener('DOMContentLoaded', function () {
    const VanQuan_List = [
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/1.mp3?v=1702059386324",
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/2.mp3?v=1702059386324",
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/3.mp3?v=1702059386324",
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/4.mp3?v=1702059386324",
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/5.mp3?v=1702059386324",
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/6.mp3?v=1702059386324",
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/7.mp3?v=1702059386324",
        "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/8.mp3?v=1702059386324",
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/9.mp3?v=1702059386324",
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/10.mp3?v=1702059386324",
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/11.mp3?v=1702059386324",
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/12.mp3?v=1702059386324",
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/13.mp3?v=1702059386324",
        "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/14.mp3?v=1702059386324",
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/15.mp3?v=1702059386324",
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/16.mp3?v=1702059386324",
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/17.mp3?v=1702059386324",
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/18.mp3?v=1702059386324",
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/19.mp3?v=1702059386324",
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/20.mp3?v=1702059386324",
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/21.mp3?v=1702059386324",
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/22.mp3?v=1702059386324",
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/23.mp3?v=1702059386324",
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/24.mp3?v=1702059386324",
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/25.mp3?v=1702059386324",
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/26.mp3?v=1702059386324",
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/27.mp3?v=1702059386324",
        // "https://cdn.glitch.global/a1bed3b1-becf-4683-8f66-c6bd3d5d8078/28.mp3?v=1702059386324",
    ];

    let index = 0;
    let audio = new Audio(VanQuan_List[index]);

    function startAutoPlay() {
        autoPlayInterval = setInterval(function () {
            if (audio.paused && autoPlayEnabled) {
                index = (index + 1) % VanQuan_List.length;
                audio.src = VanQuan_List[index];
                audio.play();
                localStorage.setItem('lastPlayedIndex', index);
            }
        }, 50);
    }

    function playNextSong() {
        if (!autoPlayEnabled) return; // Add this line to prevent autoplay after the first click
        let newIndex = index;
        while (newIndex === index) {
            newIndex = Math.floor(Math.random() * VanQuan_List.length);
        }
        index = newIndex;
        audio.src = VanQuan_List[index];
        audio.play();
        localStorage.setItem('lastPlayedIndex', index);
    }

    audio.addEventListener('ended', playNextSong);

    function VanQuanAudio() {
        if (!hasPlayed && autoPlayEnabled) {
            const clickIndex = Math.floor(Math.random() * VanQuan_List.length);
            audio.pause(); 
            audio = new Audio(VanQuan_List[clickIndex]);
            audio.play();
            hasPlayed = true;
            autoPlayEnabled = false;
            localStorage.setItem('lastPlayedIndex', clickIndex);
        }
    }

    document.addEventListener("click", VanQuanAudio);

    startAutoPlay();
    audio.play(); 
});
      </script>
  <link rel="stylesheet" href="./assets/vendor/libs/animate-css/animate.css" />
  <link rel="stylesheet" href="./assets/vendor/libs/sweetalert2/sweetalert2.css" />
  <script src="./assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
  <script src="./assets/vendor/libs/toastr/toastr.js"></script>
  
  </body>
</html>
