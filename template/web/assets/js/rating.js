document.addEventListener("DOMContentLoaded", () => {
  const ratingContainers = document.querySelectorAll("#rating-container");

  ratingContainers.forEach((container) => {
    const stars = container.querySelectorAll(".star");
    const hiddenInput = container.closest(".row").querySelector("input.rating"); // Ensure we get the correct hidden input
    let selectedRating = 0;

    if (!hiddenInput) {
      console.error("Hidden input not found for this rating container:", container);
      return; // Skip if no hidden input is found
    }

    stars.forEach((star) => {
      // Hover effect: Highlight stars up to the hovered star
      star.addEventListener("mouseover", () => {
        fillStars(star.dataset.value);
      });

      // Click to select rating: Update the selected rating and hidden input
      star.addEventListener("click", () => {
        selectedRating = parseInt(star.dataset.value, 10); // Save the selected rating
        fillStars(selectedRating); // Highlight selected stars
        hiddenInput.value = selectedRating; // Update hidden input
        console.log(`Rating selected: ${selectedRating}`);
      });

      // Mouse out: Reset to the selected rating or clear stars if none is selected
      star.addEventListener("mouseout", () => {
        if (selectedRating > 0) {
          fillStars(selectedRating); // Keep the selected rating highlighted
        } else {
          resetStars(); // Reset if no rating is selected
        }
      });
    });

    // Function to highlight stars up to a given value
    function fillStars(value) {
      stars.forEach((star) => {
        if (parseInt(star.dataset.value, 10) <= value) {
          star.textContent = "★"; // Filled star
          star.classList.remove("text-muted");
          star.classList.add("text-warning");
        } else {
          star.textContent = "☆"; // Empty star
          star.classList.remove("text-warning");
          star.classList.add("text-muted");
        }
      });
    }

    // Function to reset all stars to empty
    function resetStars() {
      stars.forEach((star) => {
        star.textContent = "☆"; // Empty star
        star.classList.remove("text-warning");
        star.classList.add("text-muted");
      });
    }
  });
});
