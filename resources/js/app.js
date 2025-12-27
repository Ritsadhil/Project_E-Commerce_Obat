import "./bootstrap";

// Ajax
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("keyword");

    if (searchInput) {
        searchInput.addEventListener("keyup", function () {
            let query = this.value;

            window.$.ajax({
                url: "/",
                type: "GET",
                data: { search: query },
                beforeSend: function () {
                    window.$("#medicine-container").css("opacity", "0.5");
                },
                success: function (response) {
                    window.$("#medicine-container").html(response);
                    window.$("#medicine-container").css("opacity", "1");
                },
                error: function (xhr) {
                    console.log("Error:", xhr.responseText);
                    window.$("#medicine-container").css("opacity", "1");
                },
            });
        });

        window.$(document).on("click", ".pagination a", function (e) {
            e.preventDefault();
            let url = window.$(this).attr("href");
            let query = searchInput.value;

            let finalUrl =
                url + (url.includes("?") ? "&" : "?") + "search=" + query;

            window.$.ajax({
                url: finalUrl,
                success: function (response) {
                    window.$("#medicine-container").html(response);
                },
            });
        });
    }
});
