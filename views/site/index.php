<?php
$this->title = 'PORI DATABASE';
$this->params['breadcrumbs'] = [['label' => $this->title]];
$baseUrl = \yii\helpers\Url::base();
?>
<style>.map{width:100%}#map{width:100%;height:100vh;}</style>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
<link rel="stylesheet" href="//unpkg.com/leaflet-gesture-handling/dist/leaflet-gesture-handling.min.css" type="text/css">
<link rel="stylesheet" href="<?= $baseUrl ?>/vendors/leaflet-markercluster/MarkerCluster.css" type="text/css">
<link rel="stylesheet" href="<?= $baseUrl ?>/vendors/leaflet-markercluster/MarkerCluster.Default.css" type="text/css">

<div class="container-fluid">
Selamat datang di backend Aplikasi BORANG PORI. Untuk menggunakan aplikasi silahkan pilih menu di sebelah kiri.<br><br>
Peta di bawah ini merepresentasikan lokasi center/RS yang memiliki fasilitas radioterapi. Jika ada RS/Center yang berdekatan maka akan
ditampilkan dalam angka jumlah center di area/lokasi tersebut, silahkan klik angka tersebut untuk melihat detailnya.
</div>


<section class="map">
    <div id='map'></div>
</section>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<script src="<?= $baseUrl ?>/vendors/leaflet-gesture/leaflet-gesture-handling.min.js"></script>
<script src="<?= $baseUrl ?>/vendors/leaflet-markercluster/leaflet.markercluster.js"></script>

<script>
    $(document).ready(function () {

        var pemasaran = [];
        var markers = [];
        var listMarker = [];

        window.mobileCheck = function () {
            let check = false;
            (function (a) { if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true; })(navigator.userAgent || navigator.vendor || window.opera);
            return check;
        };

        //Rendering peta
        if (mobileCheck()) {
            var map = L.map('map',
                {
                    gestureHandling: true
                }).setView([-2.17, 120.82], 3);
        } else {
            var map = L.map('map',
                {
                    gestureHandling: true
                }).setView([-2.17, 120.82], 5);
        }

        var listMarkers = [];

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            scrollWheelZoom: false,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var LeafIcon = L.Icon.extend({
            options: {
                iconSize: [42, 50],
            }
        });


        $.ajax({
            type: "GET",
            url: "<?=$baseUrl?>/institution/data",
            data: null,
            success: function (response) {
                data = JSON.parse(response);
                //console.log(data);
                pemasaran = data;

                //membuat cluster marker, biar marker bisa otomatis bergabung jika posisinya dekat
                markers = L.markerClusterGroup();
                
                var listCity = [];

                for (var i = 0; i < data.length; i++) {
                    var longitude = data[i].longitude;
                    var latitude = data[i].latitude;
                    //if (longitude == '' || latitude == '') continue;
                    createMarker(data[i]);

                    var city = data[i].city;
                    listCity.push(city);
                }

            },
            failure: function (response) {
                alert(response.responseText);
            },
            error: function (response) {
                alert(response.responseText);
            }
        });

        function createMarker(data) {
            var longitude = data.longitude;
            var latitude = data.latitude;
            var name = data.name;
            var address = data.address;
            var doctor = data.stats.doctor;
            var machine = data.stats.totalMachine;
            var brachytherapy = data.stats.brachytherapy;
            var patient = data.stats.patient;
            var waiting_externa = data.stats.waiting_externa===null?"Tidak Diketahui":data.stats.waiting_externa+" Minggu";
            var icon = null;

            icon = new LeafIcon({ iconUrl: "<?=$baseUrl?>/images/marketing/a-blue.png" });

            //ubah \n menjadi <br> biar ke-enter tulisannya
            //address = address.replace(/(?:\r\n|\r|\n)/g, '<br>');

            //validasi hanya yang ada longitude dan latitude yang masuk peta
            if (longitude != '' && latitude != '') {
                var marker = L.marker([latitude, longitude], { icon: icon }).bindPopup(
                    "<p><b>"+name+"</b></p><p>" + address + "</p><p> Dokter: "+doctor+" orang</p><p>Mesin: " + machine + "</p><p> Brachytherapy: "+brachytherapy+"</p><p>Pasien :"+patient+"</p><p>Waiting List :" + waiting_externa+"</p>" );
                listMarkers.push(marker);
                markers.addLayer(marker);
                map.addLayer(markers);
            }

        }

    });
</script>