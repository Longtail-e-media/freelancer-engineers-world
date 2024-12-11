document.addEventListener("DOMContentLoaded", () => {
  const ratingContainers = document.querySelectorAll("#rating-container");

  ratingContainers.forEach((container) => {
    const stars = container.querySelectorAll(".star");
    const hiddenInput = container.closest(".row").querySelector("input.rating"); // Find the hidden input in the same row
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
        if (hiddenInput) {
          hiddenInput.value = selectedRating; // Update the hidden input value
          console.log(`Updated hidden input with rating: ${hiddenInput.value}`);
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
});
