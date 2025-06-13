<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Luxury Hotel - Lamongan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Montserrat', 'sans-serif'],
            serif: ['"Playfair Display"', 'serif'],
          },
          spacing: {
            '128': '32rem',
            '144': '36rem',
          },
        }
      }
    }
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body id="beranda" class="font-sans bg-white text-gray-800 overflow-x-hidden">
  <!-- bar samping -->
  <button
    onclick="toggleSidebar()"
    class="fixed left-5 top-5 z-[1001] text-2xl bg-black text-white p-3 rounded-full cursor-pointer shadow-md transition-all hover:bg-gray-800"
  >
    ☰
  </button>

  <div
    id="sidebar"
    class="fixed top-0 left-[-250px] h-screen w-[250px] bg-white pt-16 z-[1000] shadow-xl transition-all duration-300"
  >
    <nav class="p-4">
      <a
        href="#beranda"
        class="block py-3 px-5 text-gray-800 hover:bg-gray-100 hover:pl-6 rounded transition-all duration-300 relative after:content-[''] after:absolute after:w-0 after:h-px after:bottom-0 after:left-0 after:bg-black after:transition-all after:duration-300 hover:after:w-full"
        >Beranda</a
      >
      <a
        href="#tentang"
        class="block py-3 px-5 text-gray-800 hover:bg-gray-100 hover:pl-6 rounded transition-all duration-300 relative after:content-[''] after:absolute after:w-0 after:h-px after:bottom-0 after:left-0 after:bg-black after:transition-all after:duration-300 hover:after:w-full"
        >Tentang Kami</a
      >
      <a
        href="#fasilitas"
        class="block py-3 px-5 text-gray-800 hover:bg-gray-100 hover:pl-6 rounded transition-all duration-300 relative after:content-[''] after:absolute after:w-0 after:h-px after:bottom-0 after:left-0 after:bg-black after:transition-all after:duration-300 hover:after:w-full"
        >Fasilitas</a
      >
      <a
        href="#foto"
        class="block py-3 px-5 text-gray-800 hover:bg-gray-100 hover:pl-6 rounded transition-all duration-300 relative after:content-[''] after:absolute after:w-0 after:h-px after:bottom-0 after:left-0 after:bg-black after:transition-all after:duration-300 hover:after:w-full"
        >Galeri</a
      >
      <a
        href="#kontak"
        class="block py-3 px-5 text-gray-800 hover:bg-gray-100 hover:pl-6 rounded transition-all duration-300 relative after:content-[''] after:absolute after:w-0 after:h-px after:bottom-0 after:left-0 after:bg-black after:transition-all after:duration-300 hover:after:w-full"
        >Kontak</a
      >
    </nav>
  </div>

  <!-- konten utama -->
  <div class="transition-all duration-300 w-full">
    <section class="relative h-screen w-full">
      <div class="absolute inset-0 z-0">
        <img
          src="gambar/gambar utama (1).jpg"
          alt="Luxury Hotel Lamongan"
          class="w-full h-full object-cover"
        />
        <div class="absolute inset-0 bg-black opacity-30"></div>
      </div>

      <div
        class="relative z-10 h-full flex flex-col items-center justify-center text-center text-white px-4"
      >
        <h1 class="text-5xl md:text-7xl lg:text-8xl font-serif mb-4 tracking-tight">
          LUXURY HOTEL
        </h1>
        <h2 class="text-2xl md:text-3xl font-light mb-10 tracking-widest">
          JAKARTA • INDONESIA
        </h2>

        <div class="bg-black text-white py-4 px-8 font-medium hover:bg-gray-800 transition duration-300 rounded-none uppercase tracking-wider text-sm border border-white">
          <a href="pemesanan.php">PESAN KAMAR</a>
        </div>
      </div>
    </section>
    <nav
      class="flex justify-center items-center gap-8 py-6 bg-white max-w-4xl mx-auto font-light text-lg uppercase tracking-wider border-b border-gray-200"
    >
      <a
        href="#"
        class="text-gray-800 hover:text-black transition duration-300 relative after:content-[''] after:absolute after:w-0 after:h-px after:bottom-0 after:left-0 after:bg-black after:transition-all after:duration-300 hover:after:w-full"
        >Tentang</a
      >
      <span class="text-gray-400">|</span>
      <a
        href="#"
        class="text-gray-800 hover:text-black transition duration-300 relative after:content-[''] after:absolute after:w-0 after:h-px after:bottom-0 after:left-0 after:bg-black after:transition-all after:duration-300 hover:after:w-full"
        >Foto</a
      >
      <span class="text-gray-400">|</span>
      <a
        href="#fasilitas"
        class="text-gray-800 hover:text-black transition duration-300 relative after:content-[''] after:absolute after:w-0 after:h-px after:bottom-0 after:left-0 after:bg-black after:transition-all after:duration-300 hover:after:w-full"
        >Fasilitas</a
      >
    </nav>

    <section class="max-w-4xl mx-auto px-6 py-20">
      <h1 class="text-4xl md:text-5xl font-serif mb-4 tracking-tight">Luxury Hotel</h1>
      <p class="text-xl font-light mb-12 tracking-widest">
        HOTEL DENGAN CITA RASA
      </p>

      <div class="mb-12 border-l-2 border-black pl-6">
        <h2 class="text-2xl md:text-3xl font-serif italic">
          "Not all five stars shine. We've visited thousands to find the ones that truly do."
        </h2>
      </div>

      <div class="mb-12">
        <ul class="text-lg space-y-4 font-light">
          <li class="flex items-start">
            <span class="block w-1 h-1 bg-black rounded-full mt-3 mr-3"></span>
            <span>The hotel has been completely renovated, paying a tasteful homage to Ottoman design.</span>
          </li>
          <li class="flex items-start">
            <span class="block w-1 h-1 bg-black rounded-full mt-3 mr-3"></span>
            <span>The location is perfect: an exceptional Ottoman palace on the Bosphorus.</span>
          </li>
          <li class="flex items-start">
            <span class="block w-1 h-1 bg-black rounded-full mt-3 mr-3"></span>
            <span>World-class spa facilities with traditional Turkish treatments.</span>
          </li>
        </ul>
      </div>

      <div class="font-light text-lg leading-relaxed">
      Di tengah kota yang telah berdiri sejak zaman kejayaan ir.soekarno, luxury hotels hadir sebagai sebuah hotel mewah yang menempati bekas istana Sultan di tepi monas. Hotel ini menawarkan 310 kamar yang memadukan kemegahan
       sejarah dengan kemewahan modern.
      </div>
    </section>
    <section class="relative h-screen w-full">
      <div class="absolute inset-0 z-0">
        <img
          src="gambar/gambar utama (2).jpg"
          alt="Kolam Renang Luxury Hotel"
          class="w-full h-full object-cover"
        />
        <div class="absolute inset-0 bg-black opacity-30"></div>
      </div>

      <div
        class="relative z-10 h-full flex flex-col items-center justify-center text-center text-white"
      >
        <h1 class="text-5xl md:text-7xl font-serif mb-6 tracking-tight">
          FASILITAS MEWAH
        </h1>
        <h2 class="text-xl md:text-2xl font-light tracking-widest">
          Nikmati pengalaman tak terlupakan
        </h2>
      </div>
    </section>
    <section id="fasilitas" class="bg-white py-10">
      <div class="max-w-6xl mx-auto px-6">
        <div class="mb-16 text-center">
          <h1 class="font-serif text-4xl mb-4">Also in the Luxury Hotels</h1>
          <div class="w-20 h-px bg-black mx-auto"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="group">
            <div class="overflow-hidden mb-4">
              <img src="gambar/gambar slide 3.jpg" alt="" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500" />
            </div>
            <div class="text-center py-4 border-t border-gray-200">
              <h3 class="font-serif text-xl">07.00 - 09.00</h3>
            </div>
          </div>
          
          <div class="group">
            <div class="overflow-hidden mb-4">
              <img src="gambar/pexels-ivan-samkov-4162481.jpg" alt="" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500" />
            </div>
            <div class="text-center py-4 border-t border-gray-200">
              <h3 class="font-serif text-xl">06.00 - 15.00</h3>
            </div>
          </div>
          
          <div class="group">
            <div class="overflow-hidden mb-4">
              <img src="gambar/pexels-pavel-danilyuk-6295759.jpg" alt="" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500" />
            </div>
            <div class="text-center py-4 border-t border-gray-200">
              <h3 class="font-serif text-xl">16.00 - 21.00</h3>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="max-w-4xl mx-auto px-6 pb-20 pt-10 border-t border-gray-200">
      <div id = "tentang">
        <h1 class="font-serif text-lg leading-relaxed text-center py-5">TENTANG KAMI</h1>
          <div class="font-light text-lg leading-relaxed text-center">
          Kami adalah luxury hotel yang berkomitmen untuk memberikan pengalaman menginap tak terlupakan dengan sentuhan kemewahan, kenyamanan, dan pelayanan istimewa. Setiap detail di hotel kami dirancang untuk memenuhi ekspektasi tamu yang menginginkan yang terbaik, mulai dari interior elegan, fasilitas premium, hingga layanan yang personal dan penuh perhatian. Dengan lokasi strategis di tengah kota atau di kawasan eksklusif, kami menawarkan suasana yang memadukan modernitas dan keanggunan, cocok untuk liburan, bisnis, maupun momen spesial.
          Tim kami yang profesional dan berpengalaman selalu siap memastikan setiap kunjungan Anda berkesan, karena bagi kami, kepuasan tamu adalah prioritas utama.
          </div>
      </div>
    </section>
    
    <section id="foto" class="pb-20">
      <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
          <div class="overflow-hidden">
            <img src="gambar/gambar (1).jpg" alt="" class="w-full h-full object-cover hover:scale-105 transition duration-500" />
          </div>
          <div class="overflow-hidden">
            <img src="gambar/gambar (2).jpg" alt="" class="w-full h-full object-cover hover:scale-105 transition duration-500" />
          </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <div class="overflow-hidden">
            <img src="gambar/gambar (3).jpg" alt="" class="w-full h-full object-cover hover:scale-105 transition duration-500" />
          </div>
          <div class="overflow-hidden">
            <img src="gambar/gambar (4).jpg" alt="" class="w-full h-full object-cover hover:scale-105 transition duration-500" />
          </div>
        </div>
      </div>
    </section>

    <footer id="kontak" class="bg-black text-white py-12">
      <div class="max-w-6xl mx-auto px-6">
        <div class="text-center">
          <h3 class="font-serif text-2xl mb-6">LUXURY HOTEL JAKARTA</h3>
          <p class="font-light mb-8">Jl. Tanjung periuk No.152, Jakarta, Indonesia</p>
          <div class="flex justify-center space-x-6">
            <a href="https://www.instagram.com/4lfarisiy?igsh=MTR1ZmJmMHJvenlpeA==" class="hover:text-gray-400 transition duration-300">Instagram</a>
            <a href="https://www.facebook.com/share/1AigxNyqMP/" class="hover:text-gray-400 transition duration-300">Facebook</a>
            <a href="http://Wa.me/0881026424304" class="hover:text-gray-400 transition duration-300">Whatsapp</a>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById("sidebar");
      sidebar.classList.toggle("left-0");
      sidebar.classList.toggle("left-[-250px]");
    }
  </script>
</body>
</html>