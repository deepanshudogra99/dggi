<div>
<div>
        @if (session()->has('success'))
            <div class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md">
                <span>{{ session('success') }}</span>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-md">
                <span>{{ session('error') }}</span>
            </div>
        @endif
    </div>
<div>     

    <div class="flex justify-between items-center">
    <h2 class="text-2xl font-extrabold text-green-500 leading-tight tracking-tight">District Master</h2>
    <div>
        <button wire:click="toggle('newmodal')" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">+ Add District</button>
       
    </div>
</div>

    <x-confirmation-modal wire:model="newmodal">
        <x-slot name="title">
            Add New District
        </x-slot>
        <x-slot name="content">
            <div>  
                <x-validation-errors class="mb-4" />
                    <form name="addstate" class="px-4 py-6">
                    @csrf
                        <div class="mb-4">
                            <x-label for="statename" name="statename" class="block text-sm font-medium text-gray-700"/><b>State Name</b>
                            <x-select wire:model="statename" name="statename" type="text" :ddlist="$states" idfield="stcode" textfield="stname" required class="mt-2 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter district name" />
                        </div>    
                        <div class="mb-4">
                            <x-label for="stateabr" name="stateabr" class="block text-sm font-medium text-gray-700"/><b>District Name</b>
                            <x-input wire:model="distname" name="stateabr" type="text" required class="mt-2 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter district name    " />
                        </div>    
                        <div class="mb-4">
                            <x-label for="stateabr" name="stateabr" class="block text-sm font-medium text-gray-700"/><b>District Abbrevation</b>
                            <x-input wire:model="distabbr" name="stateabr" type="text" required class="mt-2 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter district abbrevation    " />
                        </div>    
                    </form>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="flex justify-end">
                <button wire:click="$toggle('newmodal')"  class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Cancel</button>
                <button wire:click="newdistrict()"  class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 ml-2" >Submit</button>
            </div>
        </x-slot>
    </x-confirmation-modal>
    <div class="mt-10 flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300 bg-green-200 hover:bg-green-300">
                <thead class="bg-green-300 ">
                    <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black-600 uppercase tracking-wider"><b>Sr.No</b></th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black-600 uppercase tracking-wider"><b>State Name</b></th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black-600 uppercase tracking-wider"><b>District Name</b></th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black-600 uppercase tracking-wider"><b>District Code</b></th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black-600 uppercase tracking-wider"><b>District Abbrevation</b></th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black-600 uppercase tracking-wider"><b>Total Offices</b></th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black-600 uppercase tracking-wider"><b>Actions</b></th>
                    </tr>
                </thead>
                
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($tableData as $key=>$dt)
                    <tr class="hover:bg-green-100">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{++$key}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{getstatename($dt->stcode)}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{$dt->dtname}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{$dt->dtcode}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{$dt->dtabbr}}</div>
                    </td>                    
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $dt->totaloffices !== null ? $dt->totaloffices : 0 }}</div>
                    </td> 
                    <td class="px-6 py-4 whitespace-nowrap flex items-center justify-center">
                        <a href="" class="inline-block mx-2">
                        <svg width="16px" height="16px" viewBox="0 -0.5 21 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">        
                            <title>edit [#1479]</title>
                            <desc>Created with Sketch.</desc>
                            <defs>
                            </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Dribbble-Light-Preview" transform="translate(-99.000000, -400.000000)" fill="#000000">
                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                        <path d="M61.9,258.010643 L45.1,258.010643 L45.1,242.095788 L53.5,242.095788 L53.5,240.106431 L43,240.106431 L43,260 L64,260 L64,250.053215 L61.9,250.053215 L61.9,258.010643 Z M49.3,249.949769 L59.63095,240 L64,244.114985 L53.3341,254.031929 L49.3,254.031929 L49.3,249.949769 Z" id="edit-[#1479]">
                                        </path>
                                     </g>
                                </g>
                            </g>
                        </svg>
                        </a>
                        <a href="" class="inline-block mx-2">
                        <svg fill="#000000" width="19px" height="19px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M5.755,20.283,4,8H20L18.245,20.283A2,2,0,0,1,16.265,22H7.735A2,2,0,0,1,5.755,20.283ZM21,4H16V3a1,1,0,0,0-1-1H9A1,1,0,0,0,8,3V4H3A1,1,0,0,0,3,6H21a1,1,0,0,0,0-2Z"/></svg>
                        </a>
                    </td>                        
                    </tr>
                @endforeach                    
                </tbody>
                </table>
                <div class="py-2">
                    {{ $tableData->links() }}
                </div>
            </div>
            <div class="flex justify-end">
            <a wire:click="getDistrictPDF()" class="ml-4 cursor-pointer">
            <svg height="35px" width="35px" class="mt-3" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
            viewBox="0 0 512 512" xml:space="preserve">
            <path style="fill:#E2E5E7;" d="M128,0c-17.6,0-32,14.4-32,32v448c0,17.6,14.4,32,32,32h320c17.6,0,32-14.4,32-32V128L352,0H128z"/>
            <path style="fill:#B0B7BD;" d="M384,128h96L352,0v96C352,113.6,366.4,128,384,128z"/>
            <polygon style="fill:#CAD1D8;" points="480,224 384,128 480,128 "/>
            <path style="fill:#F15642;" d="M416,416c0,8.8-7.2,16-16,16H48c-8.8,0-16-7.2-16-16V256c0-8.8,7.2-16,16-16h352c8.8,0,16,7.2,16,16
                V416z"/>
            <g>
                <path style="fill:#FFFFFF;" d="M101.744,303.152c0-4.224,3.328-8.832,8.688-8.832h29.552c16.64,0,31.616,11.136,31.616,32.48
                    c0,20.224-14.976,31.488-31.616,31.488h-21.36v16.896c0,5.632-3.584,8.816-8.192,8.816c-4.224,0-8.688-3.184-8.688-8.816V303.152z
                    M118.624,310.432v31.872h21.36c8.576,0,15.36-7.568,15.36-15.504c0-8.944-6.784-16.368-15.36-16.368H118.624z"/>
                <path style="fill:#FFFFFF;" d="M196.656,384c-4.224,0-8.832-2.304-8.832-7.92v-72.672c0-4.592,4.608-7.936,8.832-7.936h29.296
                    c58.464,0,57.184,88.528,1.152,88.528H196.656z M204.72,311.088V368.4h21.232c34.544,0,36.08-57.312,0-57.312H204.72z"/>
                <path style="fill:#FFFFFF;" d="M303.872,312.112v20.336h32.624c4.608,0,9.216,4.608,9.216,9.072c0,4.224-4.608,7.68-9.216,7.68
                    h-32.624v26.864c0,4.48-3.184,7.92-7.664,7.92c-5.632,0-9.072-3.44-9.072-7.92v-72.672c0-4.592,3.456-7.936,9.072-7.936h44.912
                    c5.632,0,8.96,3.344,8.96,7.936c0,4.096-3.328,8.704-8.96,8.704h-37.248V312.112z"/>
            </g>
            <path style="fill:#CAD1D8;" d="M400,432H96v16h304c8.8,0,16-7.2,16-16v-16C416,424.8,408.8,432,400,432z"/>
        </svg>
        </a>
            </div>
            </div>
        </div>
    </div>
</div>
