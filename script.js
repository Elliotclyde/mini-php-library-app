console.log("hello world!");
let buttons = [...document.getElementsByClassName("delete-button")];

async function onDeleteClick(event) {
  console.log(event.target.dataset.bookId);
  const response = await fetch("delete.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded;charset=UTF-8",
    },
    body: "id=" + event.target.dataset.bookId,
  });

  const json = await response.json();
  if (json.result === "okay") {
    location.reload();
  } else {
    console.log(error);
  }
}

buttons.forEach((button) => {
  button.addEventListener("click", onDeleteClick);
});
