<table class="table table-invoice">
    <tbody>
        <tr>
            <td style="width: 50%; border-right: 1px solid #e5e5e5;">
                <p class="lead">Company information</p>
                <h2>Wall of Frame</h2>
                <address class="margin-none">
                    <strong>1 Infinite Loop</strong><br>
                    Cupertino, CA 95014<br>
                    408.996.1010<br>
                    <abbr title="Work email">e-mail:</abbr> <a href="mailto:#">company@mybiz.com</a><br>
                    <abbr title="Work Phone">phone:</abbr> (012) 345-678-901<br>
                    <abbr title="Work Fax">fax:</abbr> (012) 678-132-901
                </address>
            </td>
            <td class="right">
                <p class="lead">Client information</p>
                <h2>{{ $order->user->present()->name }}</h2>
                <address class="margin-none">
                    <strong>Business manager</strong> at
                    <strong><a href="#">Business</a></strong><br>
                    <abbr title="Work email">e-mail:</abbr> <a href="mailto:#">john.doe@mybiz.com</a><br>
                    <abbr title="Work Phone">phone:</abbr> (012) 345-678-901<br>
                    <abbr title="Work Fax">fax:</abbr> (012) 678-132-901
                    <div class="separator line"></div>
                    {{--<p class="margin-none"><strong>Note:</strong><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tristique rutrum libero, vel bibendum nunc.</p>--}}
                </address>
            </td>
        </tr>
    </tbody>
</table>