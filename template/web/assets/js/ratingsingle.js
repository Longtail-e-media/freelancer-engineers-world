document.addEventListener("DOMContentLoaded", () => {
    const stars = document.querySelectorAll("#rating-container .star");
    let selectedRating = 0;
  
    stars.forEach((star) => {
      // Hover effect
      star.addEventListener("mouseover", () => {
        resetStars();
        fillStars(star.dataset.value);
      });
  
      // Click to select rating
      star.addEventListener("click", () => {
        selectedRating = star.dataset.value;
        resetStars();
        fillStars(selectedRating);
        const ratingInput = document.getElementById("rating");
        if (ratingInput) {
          ratingInput.value = selectedRating;
        } else {
          console.error("Input field with id 'rating' not found!");
        }
      });
      // Reset on mouse out
      star.addEventListener("mouseout", () => {
        resetStars();
        if (selectedRating > 0) {
          fillStars(selectedRating);
        }
      });
    });
  
    function fillStars(value) {
      stars.forEach((star) => {
        if (star.dataset.value <= value) {
          star.textContent = "★"; // Filled star
          star.classList.remove("text-muted");
          star.classList.add("text-warning");
        }
      });
    }
  
    function resetStars() {
      stars.forEach((star) => {
        star.textContent = "☆"; // Empty star
        star.classList.remove("text-warning");
        star.classList.add("text-muted");
      });
    }
  });