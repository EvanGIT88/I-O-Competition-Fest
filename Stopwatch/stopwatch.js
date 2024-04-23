const display = document.getElementById("display");
let waktuBerlalu = 0;
let waktuMulai = 0;
let sedangBerjalan = false;
let perbaruiWaktu = null;
let waktuWaktu = { jam: 0, menit: 0, detik: 0, milliseconds: 0};

function start() {
   if (!sedangBerjalan) {
     waktuMulai = Date.now() - waktuBerlalu;
     perbaruiWaktu = setInterval(update, 10);
     sedangBerjalan = true;
     console.log("888");
   }

   console.log("niGGA");
}

function stop() {
   if (sedangBerjalan) {
     waktuBerlalu = Date.now() - waktuMulai;
     sedangBerjalan = false;
     clearInterval(perbaruiWaktu);
   }
}

function reset() {
    waktuBerlalu = 0;
    waktuMulai = 0;
    sedangBerjalan = false;
    clearInterval(perbaruiWaktu);
    waktuWaktu = { jam: 0, menit: 0, detik: 0, milliseconds: 0};
    display.textContent = "00:00:00:00";
}

function update() {
    waktuBerlalu = Date.now() - waktuMulai;

    //bulatkan dan rumuskan
    waktuWaktu["jam"] = Math.floor(waktuBerlalu / (1000 * 60 * 60));
    waktuWaktu["menit"] = Math.floor(waktuBerlalu / (1000 * 60) % 60);
    waktuWaktu["detik"] = Math.floor(waktuBerlalu / 1000 % 60);
    waktuWaktu["milliseconds"] = Math.floor(waktuBerlalu % 1000 / 10);

    //ubah ke string dan edit
    waktuWaktu["jam"] = String(waktuWaktu["jam"]).padStart(2, "0");
    waktuWaktu["menit"] = String(waktuWaktu["menit"]).padStart(2, "0");
    waktuWaktu["detik"] = String(waktuWaktu["detik"]).padStart(2, "0");
    waktuWaktu["milliseconds"] = String(waktuWaktu["milliseconds"]).padStart(2, "0");

    console.log(`${waktuWaktu["jam"]}:${waktuWaktu["menit"]}:${waktuWaktu["detik"]}:${waktuWaktu["milliseconds"]}`);
    display.textContent = `${waktuWaktu["jam"]}:${waktuWaktu["menit"]}:${waktuWaktu["detik"]}:${waktuWaktu["milliseconds"]}`;
}