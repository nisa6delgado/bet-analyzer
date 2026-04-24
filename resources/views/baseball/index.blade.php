<x-layout>
    <div class="bg-slate-800/50 p-6 border-b border-slate-700 mb-4 rounded-t-xl">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <div class="flex flex-col gap-2">
                <label class="text-[10px] font-bold uppercase text-slate-500 tracking-widest">Equipo</label>

                <select class="bg-slate-900 border border-slate-700 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 outline-none transition-all">
                    <option value="">Todos</option>

                    @foreach($teams as $team)
                        <option value="{{ $team }}">{{ $team }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-[10px] font-bold uppercase text-slate-500 tracking-widest">Posición</label>
                <select class="bg-slate-900 border border-slate-700 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 outline-none transition-all">
                    <option value="">Todas</option>
                    <option value="pitcher">Lanzadores</option>
                    <option value="batter">Bateadores</option>
                </select>
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-[10px] font-bold uppercase text-slate-500 tracking-widest">Rival</label>
                <select class="bg-slate-900 border border-slate-700 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 outline-none transition-all">
                    <option value="">Todos</option>
                </select>
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-[10px] font-bold uppercase text-slate-500 tracking-widest">Horario</label>
                <select class="bg-slate-900 border border-slate-700 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 outline-none transition-all">
                    <option value="">Cualquier hora</option>
                </select>
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-[10px] font-bold uppercase text-slate-500 tracking-widest">Lanzador/Bateo</label>
                <select class="bg-slate-900 border border-slate-700 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 outline-none transition-all">
                    <option value="">Ambos</option>
                    <option value="L">Zurdo</option>
                    <option value="R">Derecho</option>
                </select>
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-[10px] font-bold uppercase text-slate-500 tracking-widest">Estatus</label>
                <select class="bg-slate-900 border border-slate-700 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 outline-none transition-all">
                    <option value="">Ver todos</option>
                    <option value="active">Activos</option>
                    <option value="injured">Lesionados</option>
                </select>
            </div>
        </div>
    </div>

    <table class="w-full text-left min-w-[950px]">
        <thead>
            <tr class="border-b border-slate-700 bg-slate-800/50">
                <th class="px-6 py-5 text-[11px] font-bold uppercase text-slate-500 tracking-widest">Horario / Rival</th>
                <th class="px-6 py-5 text-[11px] font-bold uppercase text-slate-500 tracking-widest">Jugador</th>
                <th class="px-6 py-5 text-[11px] font-bold uppercase text-slate-500 tracking-widest text-center" colspan="5"></th>
            </tr>
        </thead>

        <tbody class="divide-y divide-slate-700/50">
            @foreach($players as $player)
                <tr class="hover:bg-slate-700/30 transition-all group">
                    <td class="px-6 py-6">
                        <div class="flex flex-col">
                            <span class="text-xl font-bold text-white">{{ $player->time }}</span>
                            <span class="text-[10px] text-blue-400 font-bold uppercase mt-1">vs {{ $player->opponent }}</span>
                        </div>
                    </td>
                    
                    <td class="px-6 py-6">
                        <div class="flex items-center gap-4">
                            <div class="flex">
                                <img
                                    class="p-1 w-11 bg-white transition-transform"
                                    src="https://www.mlbstatic.com/team-logos/apple-touch-icons-180x180/{{ $player->foreign_team_id }}.png"
                                    alt="{{ $player->team }}"
                                >

                                <img
                                    class="w-11 bg-slate-900"
                                    src="https://img.mlbstatic.com/mlb-photos/image/upload/d_people:generic:headshot:67:current.png/w_213,q_auto:best/v1/people/{{ $player->foreign_id }}/headshot/67/current"
                                    alt="{{ $player->name }}"
                                >
                            </div>

                            <div>
                                <div class="font-bold text-white text-lg leading-tight">
                                    <a href="https://mlb.com/player/{{ $player->foreign_id }}" target="_blank">
                                        {{ $player->name }}
                                    </a>
                                </div>

                                <div class="text-xs text-slate-500 font-medium">{{ $player->team }}</div>
                            </div>
                        </div>
                    </td>

                    @if(isset($player->splits[0]['stat']['era']))
                        <td class="px-6 py-6 text-center">
                            <div class="font-black">IP</div>

                            {!! prop($player->splits, 'ip') !!}
                        </td>

                        <td class="px-6 py-6 text-center">
                            <div class="font-black">ER</div>

                            {!! prop($player->splits, 'r') !!}
                        </td>

                        <td class="px-6 py-6 text-center">
                            <div class="font-black">H</div>

                            {!! prop($player->splits, 'h') !!}
                        </td>

                        <td class="px-6 py-6 text-center">
                            <div class="font-black">K</div>

                            {!! prop($player->splits, 'k') !!}
                        </td>

                        <td class="px-6 py-6 text-center">
                            <div class="font-black">BB</div>

                            {!! prop($player->splits, 'bb') !!}
                        </td>
                    @else
                        <td class="px-6 py-6 text-center">
                            <div class="font-black">TB</div>

                            {!! prop($player->splits, 'bases') !!}
                        </td>

                        <td class="px-6 py-6 text-center">
                            <div class="font-black">R</div>
                            
                            {!! prop($player->splits, 'runs') !!}
                        </td>

                        <td class="px-6 py-6 text-center">
                            <div class="font-black">RBI</div>
                            
                            {!! prop($player->splits, 'rbi') !!}
                        </td>

                        <td class="px-6 py-6 text-center">
                            <div class="font-black">HR</div>
                            
                            {!! prop($player->splits, 'hr') !!}
                        </td>

                        <td class="px-6 py-6 text-center">
                            <div class="font-black">H</div>
                            
                            {!! prop($player->splits, 'h') !!}
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>