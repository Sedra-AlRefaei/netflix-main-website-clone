const video = document.getElementById("scrollVideo");

// Make sure the video is ready before controlling playback
video.addEventListener("loadedmetadata", () => {
  video.pause();
  
  let targetTime = 0;
  let currentTime = 0;

  function updateScroll() {
    const videoSection = document.querySelector(".video-section");
    const scrollTop = window.scrollY;
    const sectionHeight = videoSection.offsetHeight - window.innerHeight;

    // Calculate scroll fraction (0 to 1)
    const scrollFraction = Math.min(scrollTop / sectionHeight, 1);
    targetTime = scrollFraction * video.duration;
  }

  window.addEventListener("scroll", updateScroll);

  function smoothScroll() {
    if (video.duration) {
      // Smoothly interpolate between current and target
      currentTime += (targetTime - currentTime) * 0.15;
      video.currentTime = currentTime;
    }
    requestAnimationFrame(smoothScroll);
  }

  smoothScroll();
});
