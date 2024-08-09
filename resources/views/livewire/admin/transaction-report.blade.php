<div>
    <style>
        .truncate {
            max-width: 150px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>

    <div class="w-full max-w-sm flex flex-col mx-auto text-center">
        <div x-data="{ selected: true }" class="w-full my-4">
            <div class="relative w-full rounded-md border h-10 p-1 bg-gray-200">
                <div class="relative w-full h-full flex items-center">
                    <div class="w-full flex justify-center text-gray-400 cursor-pointer">
                        <button @click="selected = true" wire:click="$set('display', true)">Bulanan</button>
                    </div>
                    <div class="w-full flex justify-center text-gray-400 cursor-pointer">
                        <button @click="selected = false" wire:click="$set('display', false)">Tahunan</button>
                    </div>
                </div>
                <span :class="{ 'left-1/2 -ml-1 text-blue font-semibold':!selected, 'left-1 text-blue font-semibold':selected }"
                    x-text="selected ? 'Bulanan' : 'Tahunan'"
                    class="bg-white shadow text-sm flex items-center justify-center w-1/2 rounded h-[1.88rem] transition-all duration-150 ease-linear top-[4px] absolute"></span>
            </div>
        </div>
    </div>

    <div>
    <select wire:model.lazy="month" id="month-select" class="select select-sm text-xs mx-2 bg-blue text-white border-none" {{ !$display ? 'disabled' : '' }}>
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        </select>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const now = new Date();
                const currentMonth = now.getMonth() + 1;
                document.getElementById('month-select').value = currentMonth;
            });
        </script>
        <select wire:model.lazy="year" class="select select-sm text-xs bg-blue text-white border-none">
            @for ($i = date('Y'); $i >= 2019; $i--) <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
    </div>
    <hr class="m-4">
    <div class="m-2 mb-4">
        <a href="" class="btn btn-xs bg-gray-200 text-blue border-none">Export</a>
    </div>

    @if ($display === true)
    <div class="m-2 overflow-auto" style="width: 100%; overflow-x: auto;">
        <table class="table table-xs">
            <thead>
                <tr>
                    <th></th>
                    <th>Nama</th>
                    <th>Kamar</th>
                    <th>Periode</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $item)
                <tr>
                    <th>{{ $starting_number + $key}}</th>
                    <td class="truncate">{{ $item->user_name }}</td>
                    <td>{{ $item->room }}</td>
                    <td>{{ $item->period }}</td>
                    <td>{{ $item->amount }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pt-2">

        <div class="flex items-center space-x-2">
            <select wire:model.lazy="paginate" class="select select-sm text-xs border-black-500">
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="75">75</option>
            </select>
            <div>
                {{ $data->links() }}
            </div>

            @else
            <div class="m-2 overflow-auto" style="width: 100%; overflow-x: auto;">
                <table class="table table-xs">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center"></th>
                            <th rowspan="2" class="text-center">Periode</th>
                            <th colspan="2" class="text-center">Tagihan</th>
                            <th colspan="2" class="text-center">Terbayar</th>
                            <th rowspan="2" class="text-center">%</th>
                        </tr>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Rp</th>
                            <th class="text-center">#</th>
                            <th class="text-center">Rp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($yearly as $key => $item)
                        <tr>
                            <th>{{ $starting_number + $key}}</th>
                            <td>{{ $item->period }}</td>
                            <td>{{ $item->jumlah_tagihan }}</td>
                            <td>{{ $item->total_tagihan }}</td>
                            <td>{{ $item->jumlah_terbayar }}</td>
                            <td>{{ $item->total_terbayar }}</td>
                            <td>{{ $item->persentase_pembayaran }} %</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif

        </div>

    </div>
</div