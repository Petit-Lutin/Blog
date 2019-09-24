document.getElementById("btn-reportComment").addEventListener("click", () => {
    document.getElementById("btn-reportComment").style.display = "none";
    document.getElementsByClassName("reportedComment").style.display = "inline-block";
    document.getElementsByClassName("deletedComment").style.display = "inline-block";
});