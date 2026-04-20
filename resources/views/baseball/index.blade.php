<x-layout>
    <table class="w-full text-left min-w-[950px]">
        <thead>
            <tr class="border-b border-slate-700 bg-slate-800/50">
                <th class="px-6 py-5 text-[11px] font-bold uppercase text-slate-500 tracking-widest">Horario / Liga</th>
                <th class="px-6 py-5 text-[11px] font-bold uppercase text-slate-500 tracking-widest">Enfrentamiento</th>
                <th class="px-6 py-5 text-[11px] font-bold uppercase text-slate-500 tracking-widest text-center">Over 2.5</th>
                <th class="px-6 py-5 text-[11px] font-bold uppercase text-slate-500 tracking-widest text-center">Ambos Marcan</th>
                <th class="px-6 py-5 text-[11px] font-bold uppercase text-slate-500 tracking-widest text-center">Over 1.5</th>
                <th class="px-6 py-5 text-[11px] font-bold uppercase text-blue-400 tracking-widest text-center text-glow-blue">Pick Recomendado</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-slate-700/50">
            @foreach($players as $player)
                <tr class="hover:bg-slate-700/30 transition-all group">
                    <td class="px-6 py-6">
                        <div class="flex flex-col">
                            <span class="font-mono text-xl font-bold text-white">{{ $player->time }}</span>
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
                                <div class="font-bold text-white text-lg leading-tight">{{ $player->name }}</div>
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-6 text-center">
                        <span class="text-xl font-mono font-black text-emerald-400">68%</span>
                    </td>

                    <td class="px-6 py-6 text-center">
                        <span class="text-xl font-mono font-black text-slate-400">51%</span>
                    </td>

                    <td class="px-6 py-6 text-center">
                        <span class="text-xl font-mono font-black text-emerald-400 text-glow">89%</span>
                    </td>
                    
                    <td class="px-6 py-6 text-center">
                        <div class="inline-block bg-blue-500/10 text-blue-400 border border-blue-500/30 px-4 py-2 rounded-lg text-[11px] font-black uppercase tracking-tighter">
                            Local (DNB)
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>