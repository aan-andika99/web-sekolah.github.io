function updateTime() {
    var date = new Date(); // Membuat objek Date
    var hours = date.getHours(); // Mendapatkan jam
    var minutes = date.getMinutes(); // Mendapatkan menit
    var seconds = date.getSeconds(); // Mendapatkan detik

    // Menambahkan angka 0 di depan angka satu digit
    hours = addLeadingZero(hours);
    minutes = addLeadingZero(minutes);
    seconds = addLeadingZero(seconds);

    var time = hours + ":" + minutes + ":" + seconds; // Format waktu

    document.getElementById("digital-clock").innerHTML = time; // Menampilkan waktu pada elemen dengan id "jam"
}

function addLeadingZero(number) {
    return (number < 10 ? "0" : "") + number; // Menambahkan angka 0 di depan angka satu digit
}

setInterval(updateTime, 1000); // Memperbarui waktu setiap 1 detik
