<x-layout>
    <div x-data="{ filters: false }">
        <div class="bg-slate-800/50 border-b border-slate-700 rounded-t-xl">
            <div x-show="filters" class="p-6">
                <div x-on:click="filters = false" class="mt-[-20px] text-[20px] font-bold text-slate-500 tracking-widest cursor-pointer w-full text-right">
                    &times;
                </div>

                <form>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                        <div class="flex flex-col gap-2">
                            <label class="ml-1 text-[10px] font-bold uppercase text-slate-500 tracking-widest">Equipo</label>

                            <select name="team" class="bg-slate-900 border border-slate-700 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 outline-none transition-all">
                                <option value="">Todos</option>

                                @foreach($teams as $team)
                                    <option {{ $team == request()->team ? 'selected' : '' }} value="{{ $team }}">{{ $team }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="ml-1 text-[10px] font-bold uppercase text-slate-500 tracking-widest">Bases</label>
                            <input value="{{ request()->bases }}" name="bases" type="text" class="bg-slate-900 border border-slate-700 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 outline-none transition-all">
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="ml-1 text-[10px] font-bold uppercase text-slate-500 tracking-widest">Innings</label>
                            <input value="{{ request()->ip }}" name="ip" type="text" class="bg-slate-900 border border-slate-700 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 outline-none transition-all">
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="ml-1 text-[10px] font-bold uppercase text-slate-500 tracking-widest">Ponches</label>
                            <input value="{{ request()->k }}" name="k" type="text" class="bg-slate-900 border border-slate-700 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 outline-none transition-all">
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="ml-1 text-[10px] font-bold uppercase text-slate-500 tracking-widest">Boletos</label>
                            <input value="{{ request()->bb }}" name="bb" type="text" class="bg-slate-900 border border-slate-700 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 outline-none transition-all">
                        </div>
                        
                        <div class="flex flex-col gap-2">
                            <label class="ml-1 text-[10px] font-bold uppercase text-slate-500 tracking-widest">Carreras</label>
                            <input value="{{ request()->r }}" name="r" type="text" class="bg-slate-900 border border-slate-700 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 outline-none transition-all">
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="ml-1 text-[10px] font-bold uppercase text-slate-500 tracking-widest">Impulsadas</label>
                            <input value="{{ request()->rbi }}" name="rbi" type="text" class="bg-slate-900 border border-slate-700 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 outline-none transition-all">
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="ml-1 text-[10px] font-bold uppercase text-slate-500 tracking-widest">Hits</label>
                            <input value="{{ request()->h }}" name="h" type="text" class="bg-slate-900 border border-slate-700 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 outline-none transition-all">
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="ml-1 text-[10px] font-bold uppercase text-slate-500 tracking-widest">Jonrones</label>
                            <input value="{{ request()->hr }}" name="hr" type="text" class="bg-slate-900 border border-slate-700 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 outline-none transition-all">
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="ml-1 text-[10px] font-bold uppercase text-slate-500 tracking-widest">&nbsp;</label>
                            <button class="cursor-pointer bg-slate-900 border border-slate-700 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 outline-none transition-all">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>

            <div x-show="!filters" x-on:click="filters = true" class="text-[11px] px-1 py-2 ml-4 font-bold text-slate-500 tracking-widest cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                </svg>
            </div>
        </div>
    </div>
    
    <table class="w-full text-left min-w-[950px]">
        <thead>
            <tr class="border-b border-slate-700 bg-slate-800/50">
                <th class="px-6 py-5 text-[11px] font-bold uppercase text-slate-500 tracking-widest">Horario / Liga</th>
                <th class="px-6 py-5 text-[11px] font-bold uppercase text-slate-500 tracking-widest">Enfrentamiento</th>
                <th class="px-6 py-5 text-[11px] font-bold uppercase text-slate-500 tracking-widest text-center"></th>
            </tr>
        </thead>

        <tbody class="divide-y divide-slate-700/50">
            @foreach($matches as $match)
                <tr id="match-{{ $match->foreign_id }}" class="hover:bg-slate-700/30 transition-all group">
                    <td class="px-6 py-6">
                        <div class="flex flex-col">
                            <span class="font-mono text-xl font-bold text-white">{{ new DateTime($match->date)->format('h:ia') }}</span>

                            <span class="flex text-[10px] text-blue-400 font-bold uppercase mt-1">
                                <img class="h-3 mr-1" src="{{ $match->league->flag ?? $match->league->logo }}" alt="{{ $match->league->name }}">

                                {{ $match->league->name }}
                            </span>
                        </div>
                    </td>
                    
                    <td class="px-6 py-6">
                        <div class="flex items-center gap-4">
                            <div class="flex -space-x-3">
                                <img class="w-11 h-11 rounded-full bg-slate-900 border-2 border-slate-800 group-hover:scale-110 transition-transform" src="{{ $match->teams->home->logo }}" alt="{{ $match->teams->home->name }}">
                                <img class="w-11 h-11 rounded-full bg-slate-900 border-2 border-slate-800 group-hover:scale-110 transition-transform" src="{{ $match->teams->away->logo }}" alt="{{ $match->teams->away->name }}">
                            </div>

                            <div>
                                <div class="font-bold text-white text-lg leading-tight">{{ $match->teams->home->name }} vs {{ $match->teams->away->name }}</div>
                            </div>
                        </div>
                    </td>
                    
                    <td class="px-6 py-6 text-center">
                        @if($match->results)
                            <div class="flex">
                                <div class="text-center mx-4">
                                    <div class="font-black">BTTS</div>

                                    {!! goals($match->results, 'btts') !!}
                                </div>

                                <div class="text-center mx-4">
                                    <div class="font-black">OVER 1.5</div>

                                    {!! goals($match->results, '1.5') !!}
                                </div>

                                <div class="text-center mx-4">
                                    <div class="font-black">OVER 2.5</div>

                                    {!! goals($match->results, '2.5') !!}
                                </div>
                            </div>
                        @else
                            <a href="/soccer/{{ $match->foreign_id }}" class="cursor-pointer inline-block bg-blue-500/10 text-blue-400 border border-blue-500/30 px-4 py-2 rounded-lg text-[11px] font-black uppercase tracking-tighter">
                                Ver datos
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>