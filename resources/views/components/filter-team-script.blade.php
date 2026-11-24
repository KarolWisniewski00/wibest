<script>
$(function () {
    let page = 1, pending = null, timer = null, revision = 0, more = true;
    function load(reset = false) {
        if (reset) { revision++; if (pending) pending.abort(); pending = null; page = 1; more = true; }
        if (pending || !more) return;
        const current = revision;
        const roles = $('.role-checkbox:checked').map(function () { return this.value; }).get();
        $('#show-filter').text(roles.length ? roles.join(', ') : 'WSZYSTKO');
        $('#team-feedback').text('');
        if (reset) { $('#body').empty(); $('#list').empty(); }
        $('#body').append(@json(view('components.loader-team', ['attributes' => new \Illuminate\View\ComponentAttributeBag(['data-team-loader' => ''])])->render()));
        $('#list').append(@json(view('components.loader-team-card', ['attributes' => new \Illuminate\View\ComponentAttributeBag(['data-team-loader' => ''])])->render()));
        pending = $.get(@json(route('api.v1.team.user.get')), {page, search: $('#search').val(), role_filter: roles});
        pending.done(function (data) {
            if (current !== revision) return;
            $('#body [data-team-loader], #list [data-team-loader]').remove();
            $('#body').append(data.table.join('')); $('#list').append(data.list.join(''));
            more = Boolean(data.next_page_url); page++;
            $('#team-feedback').text(data.count ? 'Liczba użytkowników: ' + data.count : 'Brak użytkowników pasujących do filtrów.');
        }).fail(function (_, status) {
            if (status !== 'abort' && current === revision) {
                more = false;
                $('#team-feedback').text('Nie udało się pobrać zespołu. Zmień filtr, aby spróbować ponownie.');
            }
        }).always(function () {
            if (current !== revision) return;
            pending = null;
            $('#body [data-team-loader], #list [data-team-loader]').remove();
            
            if (more && document.documentElement.scrollHeight <= window.innerHeight) load();
        });
    }
    $('#search').on('input', function () { clearTimeout(timer); timer = setTimeout(() => load(true), 250); });
    $('.role-checkbox').on('change', () => { clearTimeout(timer); load(true); });
    $(window).on('scroll.team', function () { if ($(window).scrollTop() + $(window).height() >= $(document).height() - 150) load(); });
    $(document).on('click.team auxclick.team', '[data-team-record]', function (event) {
        if ($(event.target).closest('a,button,input,select,textarea,label,[role="button"]').length || window.getSelection().toString()) return;
        const link = this.querySelector('[data-team-link]');
        if (!link || event.button > 1) return;
        event.preventDefault();
        if (event.ctrlKey || event.metaKey || event.shiftKey || event.button === 1) window.open(link.href, '_blank', 'noopener'); else link.click();
    });
    load(true);
});
</script>
