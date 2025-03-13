<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hruska.jpeg_portfolio</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
        body {
            
            font-family: 'Roboto', sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .header {
            padding: 40px 10px; /* Větší mezery nahoře i dole */
            font-size: 40px;
        }
        .contact-info {
            font-size: 18px;
            display: flex;
            justify-content: center;
            gap: 15px;
            align-items: center;
            margin-bottom: 20px;
        }
        .contact-info img {
            width: 24px;
            height: 24px;
            vertical-align: middle;
        }
        .gallery {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-auto-flow: dense;
            gap: 5px;
            padding: 10px;
            max-width: 90%;
            margin: auto;
        }
        .photo-container {
            position: relative;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }
        .photo-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease-in-out;
        }
        .photo-container:hover img {
            transform: scale(1.05);
        }
        .wide {
            grid-column: span 2;
        }
        .fullscreen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            z-index: 1000;
        }
        .fullscreen img {
            max-width: 90%;
            max-height: 90%;
        }
        .download-btn, .close-btn {
            position: absolute;
            top: 15px;
            z-index: 11;
            width: 32px;
            height: 32px;
            filter: invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(200%) contrast(100%);
        }
        .download-btn {
            left: 15px;
        }
        .close-btn {
            right: 15px;
        }

        /* Pro zajištění správného zobrazení popupu */
        #albumPopup {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(255, 255, 255, 1);
    z-index: 1000;
    width: 90%;
    max-width: 600px;
    border-radius: 10px;
    padding: 20px;
    box-sizing: border-box;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    display: flex;
    flex-direction: column;
    justify-content: center; /* Vystředění vertikálně */
    align-items: center; /* Vystředění horizontálně */
    }

    #albumPopup .popup-content {
    display: grid;
    grid-template-columns: repeat(4, 1fr); /* 4 tlačítka vedle sebe */
    gap: 10px;
    width: fit-content; /* Přizpůsobí šířku obsahu - potřebné pro vystředění */
    max-height: 60vh;
    overflow-y: auto;
    padding: 10px;
    margin: 0 auto; /* Vystředí celou mřížku */
}

#albumPopup .popup-content h2 {
    grid-column: span 4;
    margin-bottom: 20px;
    text-align: center;
    justify-self: center; /* Vystředění nadpisu */
}

#albumPopup .popup-content button {
    padding: 12px;
    font-size: 16px;
    background-color: #595959;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
    width: 100%;
    max-width: 200px; /* Maximální šířka tlačítek */
}

 #albumPopup .popup-content button:hover {
    background-color: #516959;
}
        /* Pozice a vzhled křížku pro zavření popupu */
        #albumPopup .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            color: white;
            background-color: transparent;
            border: none;
            cursor: pointer;
        }

        #overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.7);
    z-index: 999;
}
#errorMessage {
    color: red;
    font-size: 16px;
    height: 24px; 
    margin-top: 10px;
    text-align: center;
}


    </style>
</head>
<head>
    <div class="header">hruska.jpeg</div>
    <div class="contact-info">
        <img src="icons/6929237_instagram_icon.png" alt="Instagram"> hruska.jpeg |
        <img src="icons/134146_mail_email_icon.png" alt="Email"> hruska.d07@seznam.cz |
        <img src="icons/8665646_phone_communication_icon.png" alt="Telefon"> 608848444
    </div>

    <!-- Tlačítko pro zobrazení alba -->
    <button onclick="openAlbumPopup()" style="padding: 20px 40px; font-size: 20px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer; margin: 20px 0;">
        alba
    </button>
    <div id="overlay" style="display: none;"></div>

    <!-- Popup okno pro výběr alba -->
    <div id="albumPopup" style="display: none;">
        <div class="popup-content">
            <span onclick="closeAlbumPopup()" class="close-btn">&times;</span>
            <h2>Vyber album:</h2>
            <button onclick="openAlbum('festival.php')">Festival</button>
            <button onclick="openAlbum('svatba.php')">Svatba</button>
            <button onclick="openAlbum('priroda.php')">Příroda</button>
            <button onclick="openAlbum('cipa.php')">Cipa</button>
            <button onclick="openAlbum('cipea.php')">Cipa</button>
            <button onclick="openAlbum('cieeepa.php')">Cipa</button>
            <button onclick="openAlbum('cipddsa.php')">Cipa</button>
            <button onclick="openAlbum('cipa.php')">Cipa</button>
            <button onclick="openAlbum('cipsa.php')">Cipa</button>
            <button onclick="openAlbum('cipadsssdsd.php')">Cipa</button>
            <button onclick="openAlbum('cipadsssdsd.php')">Cipa</button>
            <button onclick="openAlbum('cipadsssdsd.php')">Cipa</button>
            <button onclick="openAlbum('cipadsssdsd.php')">Cipa</button>
            <button onclick="openAlbum('cipadsssdsd.php')">Cipa</button>
            <button onclick="openAlbum('cipadsssdsd.php')">Cipa</button>
            <button onclick="openAlbum('cipadsssdsd.php')">Cipa</button>
            <button onclick="openAlbum('cipadsssdsd.php')">Cipa</button>
        </div>
        <div class="hidden-album">
    <h3>Najít skryté album:</h3>
    <input type="text" id="hiddenAlbumCode" placeholder="Zadejte kód alba" style="padding: 10px; font-size: 16px;">
    <button onclick="findHiddenAlbum()" style="padding: 10px; font-size: 16px; margin-top: 10px;">Otevřít album</button>
</div>
<div id="errorMessage" style="color: red; font-size: 16px; height: 24px; margin-top: 10px;"></div>


    </div>
  

    <div class="gallery">
        <?php
            $dir = "fotky";
            $files = array_diff(scandir($dir), array('.', '..'));
            $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
            $images = [];

            foreach ($files as $file) {
                $file_path = "$dir/$file";
                $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                if (in_array(strtolower($extension), $allowed_extensions)) {
                    $timestamp = filemtime($file_path);
                    $images[] = [
                        'path' => $file_path,
                        'name' => $file,
                        'timestamp' => $timestamp
                    ]; 
                }
            }
            usort($images, function($a, $b) {
                $isPinA = preg_match('/pin(\d*)/i', $a['name'], $matchA) ? (int)($matchA[1] ?? 0) : PHP_INT_MAX;
                $isPinB = preg_match('/pin(\d*)/i', $b['name'], $matchB) ? (int)($matchB[1] ?? 0) : PHP_INT_MAX;
                return $isPinA - $isPinB ?: $b['timestamp'] - $a['timestamp'];
            });

            foreach ($images as $image) {
                $image_info = getimagesize($image['path']);
                $width = $image_info[0];
                $height = $image_info[1];
                $class = ($width > $height) ? 'wide' : '';
                $thumbnail = "{$image['path']}?resize=small";
                echo "<div class='photo-container $class' onclick='openFullscreen(\"{$image['path']}\")'>";
                echo "<img src='$thumbnail' alt='Fotografie'>";
                echo "</div>";
            }
        ?>
    </div>

    <!-- Fullscreen modal -->
    <div id="fullscreenModal" class="fullscreen" style="display: none;">
        <a id="downloadBtn" class="download-btn" download><img src="icons/8542038_download_data_icon.svg" alt="Download"></a>
        <img id="fullscreenImg" src="">
        <img class="close-btn" src="icons/4879885_close_cross_delete_remove_icon.svg" alt="Close" onclick="closeFullscreen()">
    </div>



    <script>

    function openFullscreen(src) {
            document.getElementById("fullscreenImg").src = src;
            document.getElementById("fullscreenModal").style.display = "flex";
            document.getElementById("downloadBtn").href = src;
        }

        function closeFullscreen() {
            document.getElementById("fullscreenModal").style.display = "none";
        }

        function openAlbumPopup() {
    document.getElementById("albumPopup").style.display = "block";
    document.getElementById("overlay").style.display = "block";
}

function closeAlbumPopup() {
    document.getElementById("albumPopup").style.display = "none";
    document.getElementById("overlay").style.display = "none";
    clearError(); // Skryje chybovou zprávu

}


        function openAlbum(page) {
            window.location.href = page;
        }
        

        function findHiddenAlbum() {
    const code = document.getElementById("hiddenAlbumCode").value.trim();
    const errorMsg = document.getElementById("errorMsg");

    if (code) {
        const albumUrl = code + ".php";

        fetch(albumUrl, { method: 'HEAD' })
            .then(response => {
                if (response.ok) {
                    window.location.href = albumUrl;
                } else {
                    showError("Album neexistuje!");
                }
            })
            .catch(() => {
                showError("Album neexistuje!");
            });
    } else {
        showError("Zadejte kód alba!");
    }
}

function showError(message) {
    const errorElement = document.getElementById("errorMessage");
    errorElement.textContent = message;
}

function clearError() {
    const errorElement = document.getElementById("errorMessage");
    errorElement.textContent = ""; // Vymaže text, ale prostor zůstane
}
document.getElementById("hiddenAlbumCode").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { 
        event.preventDefault(); // Zabrání tomu, aby Enter odeslal formulář
        findHiddenAlbum(); // Spustí funkci pro otevření alba
    }
});




// Schová chybu při psaní
document.getElementById("hiddenAlbumCode").addEventListener("input", clearError);



    </script>
    </body>
</html>