<!DOCTYPE html>
<html>

<head>
    <title>Biodata Pribadi</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }

        h1 {
            margin: 0;
            font-size: 36px;
        }

        nav {
            background-color: #666;
            color: white;
            overflow: hidden;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 24px;
            margin: 0 10px;
        }

        nav a:hover {
            color: #ffd700;
        }

        section {
            background-color: #fff;
            border: 1px solid #ccc;
            margin: 20px;
            padding: 20px;
            clear: both;
            overflow: auto;
        }

        aside {
            background-color: #ddd;
            color: #333;
            float: center;
            width: 94%;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <h1>Biodata Pribadi</h1>
    </header>

    <nav>
        <a href="#personal-info">Personal Info</a>
        <a href="#education">Education</a>
        <a href="#skills">Skills</a>
        <a href="#contact">Contact</a>
    </nav>

    <section id="personal-info">
        <h2>Personal Info</h2>
        <p>Nama: Muhammad Thayyib</p>
        <p>Tanggal Lahir: 31 Desember 2002</p>
        <p>Jenis Kelamin: Laki-laki</p>
        <p>Alamat: Jambi</p>
    </section>

    <section id="education">
        <h2>Education</h2>
        <ul>
            <li>SMA Negeri 2 Kota Jambi</li>
            <li>Universitas Negeri Padang</li>
        </ul>
    </section>

    <section id="skills">
        <h2>Skills</h2>
        <ul>
            <li>Web Development</li>
            <li>Data Analysis</li>
            <li>Mobile Programming</li>
        </ul>
    </section>

    <aside>
        <h2>About Me</h2>
        <p>
            Saya adalah seorang mahasiswa di Universitas Negeri Padang, jurusan
            Informatika. Saya tertarik dengan bidang web development, data analysis,
            dan mobile programming. Saya merasa bahwa teknologi informasi sangat
            menarik karena selalu berkembang dan memberikan tantangan baru. Sejak
            awal kuliah, saya sudah mulai belajar dan mengembangkan keterampilan
            saya di bidang web development. Saya belajar membuat halaman web dengan
            HTML, CSS, dan JavaScript. Saya juga belajar menggunakan berbagai
            kerangka kerja seperti Bootstrap untuk mempercepat pengembangan aplikasi
            web. Saya juga tertarik dengan bidang data analysis dan belajar
            menggunakan bahasa pemrograman Python serta berbagai library seperti
            Pandas dan NumPy untuk mengolah dan menganalisis data. Saya merasa bahwa
            kemampuan analisis data menjadi sangat penting dalam era digital ini.
            Terakhir, saya juga mulai belajar mobile programming dengan menggunakan
            Flutter. Saya berharap bisa mengembangkan aplikasi mobile yang dapat
            memberikan manfaat bagi banyak orang di masa depan. Saya bersemangat
            untuk terus belajar dan mengembangkan keterampilan saya di bidang
            teknologi informasi. Saya berharap dapat berkontribusi dalam industri
            teknologi informasi di masa depan.
        </p>
    </aside>

    <section id="contact">
        <h2>Contact</h2>
        <form>
            <h2>Hubungi Saya</h2>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" /><br /><br />
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" /><br /><br />
            <label for="pesan">Pesan:</label><br />
            <textarea id="pesan" name="pesan" rows="4" cols="30"></textarea><br /><br />
            <button type="submit" onclick="kirimPesan()">Kirim Pesan</button>
        </form>
    </section>

    <footer>
        <p>
            &copy; 2023 Biodata Pribadi | Last Access:
            <span id="lastUpdated"></span>
        </p>
    </footer>

    <script type="text/javascript">
        // Mendapatkan tanggal dan waktu saat ini
        var now = new Date();
        var formattedDate =
            now.getDate() + "-" + (now.getMonth() + 1) + "-" + now.getFullYear();
        var formattedTime =
            now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();

        // Menampilkan tanggal dan waktu saat ini di footer
        document.getElementById("lastUpdated").innerHTML =
            formattedDate + " " + formattedTime;
    </script>

    <script type="text/javascript">
        function kirimPesan() {
            var nama = document.getElementById("nama").value;
            var email = document.getElementById("email").value;
            var pesan = document.getElementById("pesan").value;

            if (nama === "" || email === "" || pesan === "") {
                alert("Mohon lengkapi form pesan!");
            } else {
                alert("Terima kasih, " + nama + ". Pesan Anda telah terkirim.");
                document.getElementById("nama").value = "";
                document.getElementById("email").value = "";
                document.getElementById("pesan").value = "";
            }
        }
    </script>
    
    <script type="text/javascript">
    function kirimPesan() {
        alert('Pesan berhasil dikirim!');
    }
</script>
    
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["nama"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["pesan"]);

    // Check that data was sent to the mailer.
    if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Please fill out all fields and provide a valid email address.";
        exit;
    }

    // Set the recipient email address.
    $recipient = "mthayyib@student.unp.ac.id";

    // Set the email subject.
    $subject = "New contact from $name";

    // Build the email content.
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Build the email headers.
    $email_headers = "From: $name <$email>";

    // Send the email.
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        http_response_code(200);
        echo "Thank You! Your message has been sent.";
    } else {
        http_response_code(500);
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
}
?>

</body>

</html>
