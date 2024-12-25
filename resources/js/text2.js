const text = "Selamat Datang";
const emoji = "😍";
const typingElement = document.getElementById("typing-text");
let index = 0;

function typeText() {
    if (index < text.length) {
        typingElement.textContent += text.charAt(index);
    } else if (index === text.length) {
        typingElement.textContent += emoji;
    }
    index++;

    if (index < text.length + emoji.length) {
        setTimeout(typeText, 150);
    } else {
        setTimeout(resetText, 1000);
    }
}

function resetText() {
    typingElement.textContent = ""; 
    index = 0; 
    setTimeout(typeText, 500);
}

window.onload = typeText;
