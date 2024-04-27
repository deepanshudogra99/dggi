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
    <!-- <div class="flex justify-center items-center">
        <h2 class="text-2xl font-extrabold text-red-500 leading-tight tracking-tight">State Master</h2>
        <button wire:click="toggle('newmodal')" class="ml-auto px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">+ Add State</button>
        <button wire:click="toggle('newmodal')" class="ml-auto px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Report</button>
    </div> -->
    <div class="flex justify-between items-center">
    <h2 class="text-2xl font-extrabold text-red-500 leading-tight tracking-tight">State Master</h2>
    <div>
        <button wire:click="toggle('newmodal')" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">+ Add State</button>
        <a wire:click="toggle('newmodal')" class="ml-4  bg-red-500 text-white rounded-md hover:bg-red-600">
            <svg height="30px" width="30px" class="mt-3" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
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

    <x-confirmation-modal wire:model="newmodal">
        <x-slot name="title">
            Add New State
        </x-slot>
        <x-slot name="content">
            <div>  
                <x-validation-errors class="mb-4" />
                    <form name="addstate" class="px-4 py-6">
                    @csrf
                        <div class="mb-4">
                            <x-label for="statename" name="statename" class="block text-sm font-medium text-gray-700"/><b>State Name</b>
                            <x-input wire:model="statename" name="statename" type="text" required class="mt-2 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter state name" />
                        </div>    
                        <div class="mb-4">
                            <x-label for="stateabr" name="stateabr" class="block text-sm font-medium text-gray-700"/><b>State Abbrevation</b>
                            <x-input wire:model="stateabr" name="stateabr" type="text" required class="mt-2 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter state abbrevation    " />
                        </div>    
                    </form>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="flex justify-end">
                <button wire:click="$toggle('newmodal')"  class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Cancel</button>
                <button wire:click="newstate()"  class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 ml-2" >Submit</button>
            </div>
        </x-slot>
    </x-confirmation-modal>
        <div class="mt-10 flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300 bg-red-200 hover:bg-red-300">
                <thead class="bg-red-300 ">
                    <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black-600 uppercase tracking-wider"><b>Sr.No</b></th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black-600 uppercase tracking-wider"><b>State Name</b></th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black-600 uppercase tracking-wider"><b>State Code</b></th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black-600 uppercase tracking-wider"><b>State Abbrevation</b></th>
                    </tr>
                </thead>
                
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($tableData as $key=>$dt)
                    <tr class="hover:bg-red-100">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{++$key}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{$dt->stname}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{$dt->stcode}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{$dt->stabbr}}</div>
                    </td>                    
                    </tr>
                @endforeach                    
                </tbody>
                </table>
                <div class="py-2">
                    {{ $tableData->links() }}
                </div>
            </div>
            </div>
        </div>
    </div>
    

</div>


