$(function () {
  $("#navbar").load("./components/navbar.html", function () {
    const currentPath = window.location.pathname;
    $("#navbar .nav-link").each(function () {
      const linkPath = $(this).attr("href");
      if (currentPath.includes(linkPath)) {
        $(this).addClass("active");
      } else {
        $(this).removeClass("active");
      }
    });
  });

  $("#footer").load("./components/footer.html");
});
