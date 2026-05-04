@extends('Frontend.layouts.Main')

@section('content')
     {{-- hero section --}}
    <div class="h-[93vh] bg-cover bg-center text-white relative"
        style="background-image: url('https://wp-themes.com/wp-content/themes/production-factory/assets/images/banner-image.png');">

        <div class="absolute inset-0 bg-black/40"></div>

        <!-- RED STRIP -->
        <div class="absolute bottom-0 right-0 w-full lg:w-8/10 overflow-hidden">

            <div class="absolute inset-0 bg-[#ED1C24]
        [clip-path:polygon(10%_0,100%_0,100%_100%,0_100%)]">
            </div>

            <div
                class="relative z-10 px-5 md:pl-15 lg:pl-20 2xl:px-40 py-4 md:py-6 flex flex-col md:flex-row items-center justify-between gap-3 text-sm md:text-base">

                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-phone text-black"></i>
                    <p class="break-all">+855 12 590 666</p>
                </div>

                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-envelope text-black"></i>
                    <p class="break-all">tkd.manufacturing89@gmail.com</p>
                </div>

                <div class="flex items-center gap-2 text-center md:text-left">
                    <i class="fa-solid fa-bullhorn text-black"></i>
                    <p class="text-xs md:text-sm lg:text-base">
                        Delivering Industrial Excellence with Every Product.
                    </p>
                </div>

            </div>
        </div>

        <!-- HERO CONTENT -->
        <div class="container mx-auto px-5 flex items-center h-full relative z-10">
            <div class="w-full lg:w-1/2 flex flex-col gap-5 text-center md:text-left">

                <h2
                    class="text-xl sm:text-2xl md:text-4xl lg:text-[44px]
                       leading-snug md:leading-tight font-bold break-words">
                    Sustainable Rice-Flour Straws from Cambodia to the World
                </h2>

                <p class="text-sm sm:text-base md:text-lg lg:text-[22px] leading-relaxed">
                    Eco-friendly, biodegradable, and durable alternatives to plastic straws.
                </p>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 w-full">
                    <a href=""
                        class="w-full sm:w-auto px-6 py-3 border border-[#ED1C24]
                          bg-white text-[#ED1C24] font-semibold text-center">
                        Get a Quote
                    </a>

                    <a href=""
                        class="w-full sm:w-auto px-6 py-3 border border-[#ED1C24]
                          bg-white text-[#ED1C24] font-semibold text-center">
                        View Products
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- CONTACT SECTION -->
    <section id="contact" class="bg-gray-50 py-20 px-4">
        <div class="container mx-auto">

            <!-- HEADER -->
            <div class="text-center mb-14">
                <h2 class="text-3xl md:text-4xl font-bold text-[#0B0B54]">
                    Get in Touch
                </h2>

                <p class="text-gray-600 mt-3">
                    Request a quotation or explore our manufacturing solutions
                </p>

                <div class="w-24 h-1 bg-[#ED1C24] mx-auto mt-4 rounded"></div>
            </div>

            <div class="grid lg:grid-cols-3 gap-8">

                <!-- LEFT SIDE -->
                <div class="lg:col-span-1 space-y-6">

                    <!-- CONTACT INFO -->
                    <div class="bg-white p-6 rounded-xl shadow-sm border">
                        <h3 class="font-semibold text-lg text-[#0B0B54] mb-4">
                            Contact Information
                        </h3>

                        <div class="space-y-4 text-sm">

                            <!-- EMAIL -->
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-envelope text-[#ED1C24] mt-1"></i>
                                <div>
                                    <p class="text-gray-500">Email</p>
                                    <a href="mailto:tkd.manufacturing89@gmail.com" class="text-[#ED1C24] font-medium">
                                        tkd.manufacturing89@gmail.com
                                    </a>
                                </div>
                            </div>

                            <!-- PHONE -->
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-phone text-[#ED1C24] mt-1"></i>
                                <div>
                                    <p class="text-gray-500">Phone</p>
                                    <a href="tel:+85512590666" class="text-[#ED1C24] font-medium">
                                        +855 12 590 666
                                    </a>
                                </div>
                            </div>

                            <!-- LOCATION -->
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-location-dot text-[#ED1C24] mt-1"></i>
                                <div>
                                    <p class="text-gray-500">Location</p>
                                    <p class="font-medium text-gray-800">
                                        Pursat Province, Cambodia
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- MANUFACTURING MAP -->
                    <div class="bg-white rounded-xl overflow-hidden shadow-sm border">
                        <div class="p-4 border-b font-semibold text-[#0B0B54]">
                            Manufacturing Location
                        </div>
                        <iframe src="https://maps.google.com/maps?q=Cambodia&t=k&z=5&output=embed" class="w-full h-56">
                        </iframe>
                    </div>

                    <!-- OFFICE MAP -->
                    <div class="bg-white rounded-xl overflow-hidden shadow-sm border">
                        <div class="p-4 border-b font-semibold text-[#0B0B54]">
                            Office Location
                        </div>
                        <iframe src="https://maps.google.com/maps?q=Cambodia&t=k&z=5&output=embed" class="w-full h-56">
                        </iframe>
                    </div>

                </div>

                <!-- RIGHT SIDE FORM -->
                <div class="lg:col-span-2 bg-white p-8 rounded-xl shadow-sm border">

                    <h3 class="text-xl font-semibold text-[#0B0B54] mb-6">
                        Request Quotation
                    </h3>

                    <form action="mailto:tkd.manufacturing89@gmail.com" method="POST" enctype="text/plain"
                        class="grid md:grid-cols-2 gap-4">

                        <input type="text" name="full_name" placeholder="Full Name"
                            class="border p-3 rounded-lg focus:ring-2 focus:ring-[#ED1C24] outline-none">

                        <input type="text" name="company" placeholder="Company Name"
                            class="border p-3 rounded-lg focus:ring-2 focus:ring-[#ED1C24] outline-none">

                        <!-- COUNTRY (ALL COUNTRIES) -->
                        <select name="country"
                            class="border p-3 rounded-lg focus:ring-2 focus:ring-[#ED1C24] md:col-span-2">

                            <option>Select Country</option>
                            <option>Afghanistan</option>
                            <option>Albania</option>
                            <option>Algeria</option>
                            <option>Andorra</option>
                            <option>Angola</option>
                            <option>Argentina</option>
                            <option>Australia</option>
                            <option>Austria</option>
                            <option>Bangladesh</option>
                            <option>Belgium</option>
                            <option>Brazil</option>
                            <option>Canada</option>
                            <option>China</option>
                            <option>Cambodia</option>
                            <option>Denmark</option>
                            <option>Egypt</option>
                            <option>France</option>
                            <option>Germany</option>
                            <option>India</option>
                            <option>Indonesia</option>
                            <option>Italy</option>
                            <option>Japan</option>
                            <option>South Korea</option>
                            <option>Laos</option>
                            <option>Malaysia</option>
                            <option>Mexico</option>
                            <option>Netherlands</option>
                            <option>New Zealand</option>
                            <option>Norway</option>
                            <option>Philippines</option>
                            <option>Portugal</option>
                            <option>Russia</option>
                            <option>Saudi Arabia</option>
                            <option>Singapore</option>
                            <option>Spain</option>
                            <option>Sweden</option>
                            <option>Switzerland</option>
                            <option>Thailand</option>
                            <option>United Kingdom</option>
                            <option>United States</option>
                            <option>Vietnam</option>
                            <!-- you can expand more if needed -->
                        </select>

                        <input type="email" name="email" placeholder="Email"
                            class="border p-3 rounded-lg focus:ring-2 focus:ring-[#ED1C24] outline-none">

                        <input type="text" name="whatsapp" placeholder="WhatsApp"
                            class="border p-3 rounded-lg focus:ring-2 focus:ring-[#ED1C24] outline-none">

                        <select name="product"
                            class="border p-3 rounded-lg focus:ring-2 focus:ring-[#ED1C24] md:col-span-2">

                            <option>Product Inquiry</option>
                            <option>Rice-Flour Straws</option>
                            <option>Paper Cups & Bowls</option>
                            <option>Recycled Plastic Cups</option>
                        </select>

                        <input type="number" name="quantity" placeholder="Quantity"
                            class="border p-3 rounded-lg focus:ring-2 focus:ring-[#ED1C24] md:col-span-2">

                        <button type="submit"
                            class="md:col-span-2 bg-[#ED1C24] text-white py-3 rounded-lg font-semibold hover:bg-red-700 transition">
                            🚀 Request Quotation
                        </button>

                    </form>

                </div>

            </div>
        </div>
    </section>
@endsection
