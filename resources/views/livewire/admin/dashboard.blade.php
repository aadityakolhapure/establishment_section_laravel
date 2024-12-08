<div class="container bg-[#f3f4f6] mx-auto p-6">
    <div class="card bg-white p-5 ">
        <div class="flex items-center">
            <div class="w-1/3">
                <img src="{{ asset('images/banner-img.png') }}" alt="Banner Image" class="rounded-md">
            </div>
            <div class="w-2/3">
                @php
                    $user = \App\Models\User::find(auth()->id());
                @endphp
                <h4 class="text-xl font-medium mb-4 capitalize">
                    Welcome back
                    <span class="font-bold text-2xl text-blue-600">{{ $user->name }}</span>,
                </h4>
                <p class="text-lg text-gray-600">
                    in Dnyanshree Institute of Engineering and Technology, Satara as a <span
                        class="font-semibold">{{ $user->role }}</span>
                </p>
            </div>
        </div>
    </div>

    <div class="card bg-white p-5 rounded-lg shadow-md mb-8 mt-8">
        <div class="flex space-x-8">
            <!-- Number of Departments -->
            <div class="w-1/4 text-center">
                <h5 class="text-xl font-semibold text-gray-800">Departments</h5>
                <p class="text-3xl font-bold text-blue-600">4</p>
            </div>
            <!-- Number of Faculty -->
            <div class="w-1/4 text-center">
                <h5 class="text-xl font-semibold text-gray-800">Faculty</h5>
                <p class="text-3xl font-bold text-blue-600">40</p>
            </div>
            <!-- Number of Employees -->
            <div class="w-1/4 text-center">
                <h5 class="text-xl font-semibold text-gray-800">Employees</h5>
                <p class="text-3xl font-bold text-blue-600">56</p>
            </div>
            <!-- Number of HODs -->
            <div class="w-1/4 text-center">
                <h5 class="text-xl font-semibold text-gray-800">HODs</h5>
                <p class="text-3xl font-bold text-blue-600">4</p>
            </div>
        </div>
    </div>


</div>
