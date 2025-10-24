<?php

$feedback_message = '';
$message_class = ''; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (empty($name) || empty($email) || empty($message)) {
        $feedback_message = 'Error: Semua field wajib diisi!';
  
        $message_class = 'bg-red-100 border border-red-400 text-red-700';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $feedback_message = 'Error: Format email tidak valid!';
        $message_class = 'bg-red-100 border border-red-400 text-red-700';
    } else {
        $feedback_message = "Terima kasih, $name. Pesan Anda telah kami terima!";

        $message_class = 'bg-green-100 border border-green-400 text-green-700';
        $_POST = array(); 
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Digital Agency (Tailwind)</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-800">DigitalAgency</h1>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="index.html" class="text-gray-600 hover:text-blue-600 font-medium">Home</a></li>
                    <li><a href="index.html#about" class="text-gray-600 hover:text-blue-600 font-medium">About Us</a></li>
                    <li><a href="index.html#services" class="text-gray-600 hover:text-blue-600 font-medium">Services</a></li>
                    <li><a href="contact.php" class="text-gray-600 hover:text-blue-600 font-medium">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section id="contact-form" class="py-20">
            <div class="container mx-auto px-6">
                <div class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow-lg">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4 text-center">Contact Us</h2>
                    <p class="text-gray-700 text-center mb-8">Ada pertanyaan? Kirimkan pesan melalui formulir di bawah ini.</p>

                    <form action="contact.php" method="POST">
                        
                        <?php if (!empty($feedback_message)): ?>
                            <div class="px-4 py-3 rounded-lg mb-6 text-center font-medium <?php echo $message_class; ?>">
                                <?php echo $feedback_message; ?>
                            </div>
                        <?php endif; ?>

                        <div class="mb-5">
                            <label for="name" class="block text-gray-700 font-medium mb-2">Nama Anda</label>
                            <input type="text" id="name" name="name" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>">
                        </div>
                        
                        <div class="mb-5">
                            <label for="email" class="block text-gray-700 font-medium mb-2">Email Anda</label>
                            <input type="email" id="email" name="email" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
                        </div>
                        
                        <div class="mb-8">
                            <label for="message" class="block text-gray-700 font-medium mb-2">Pesan Anda</label>
                            <textarea id="message" name="message" rows="5" 
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            ><?php echo isset($_POST['message']) ? $_POST['message'] : '' ?></textarea>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" 
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                                Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2025 DigitalAgency. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="script.js"></script>

</body>
</html>