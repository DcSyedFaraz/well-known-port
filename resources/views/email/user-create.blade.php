<div style="background-color:#eeeeee">
    <div style="background-color:#eeeeee">
        <div style="background:#ffffff;background-color:#ffffff;margin:0px auto;max-width:600px">
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
                style="background:#ffffff;background-color:#ffffff;width:100%;padding-top: 1.8em">
                <tbody>
                    <tr>
                        <td style="direction:ltr;font-size:0px;padding:0 20px;text-align:center;vertical-align:top">
                            <div style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                    style="vertical-align:top" width="100%">
                                    <tbody>
                                        <tr>
                                            <td align="left" style="font-size:0px;padding:0 25px;word-break:break-word">
                                                <div
                                                    style="font-family:Poppins,sans-serif;font-size:14px;line-height:20px;text-align:left;color:#555555">
                                                    Hello <strong style="color:#380036"> {{ $user->name }} </strong>,<br> Greetings
                                                    from <strong style="color:#380036">{{ config('app.name') }}</strong><br>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left"
                                                style="font-size:0px;padding:10px 25px;word-break:break-word">
                                                <div
                                                    style="font-family:Poppins,sans-serif;font-size:14px;line-height:20px;text-align:left;color:#555555">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left"
                                                style="font-size:0px;padding:10px 25px;word-break:break-word">
                                                <div
                                                    style="font-family:Poppins,sans-serif;font-size:14px;line-height:20px;text-align:left;color:#555555">
                                                    Thank you for showing an interest in our service, we strive to
                                                    provide the best quality services to meet the desired standards.
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left"
                                                style="font-size:0px;padding:10px 25px;word-break:break-word">
                                                <table cellpadding="0" cellspacing="0" width="100%" border="0"
                                                    style="color:#000000;font-family:Poppins,sans-serif;font-size:13px;line-height:22px;table-layout:auto;width:100%">
                                                    <tbody>
                                                        <tr
                                                            style="border:1px solid #ecedee;text-align:left;padding:15px 10px">
                                                            <th style="padding:5px;border:1px solid #ecedee;color:#fff;letter-spacing:1px;word-spacing:1px;font-size:16px;background:#380036"
                                                                colspan="2"
                                                                background="#m_-1782676834419212913_m_5808075846688590949_m_-4111595796407651444_380036;">
                                                                Account Details</th>
                                                        </tr>
                                                        <tr
                                                            style="border:1px solid #ecedee;text-align:left;padding:15px 10px 0">
                                                            <td
                                                                style="padding:5px;border:1px solid #ecedee;color:#380036;letter-spacing:1px;word-spacing:1px;font-size:14px">
                                                                Email
                                                            </td>
                                                            <td
                                                                style="padding:5px;border:1px solid #ecedee;color:#000;letter-spacing:1px;word-spacing:1px;font-size:14px">
                                                                {{ $user->email }}
                                                            </td>
                                                        </tr>
                                                        <tr
                                                            style="border:1px solid #ecedee;text-align:left;padding:15px 10px 0">
                                                            <td
                                                                style="padding:5px;border:1px solid #ecedee;color:#380036;letter-spacing:1px;word-spacing:1px;font-size:14px">
                                                                Password
                                                            </td>
                                                            <td
                                                                style="padding:5px;border:1px solid #ecedee;color:#000;letter-spacing:1px;word-spacing:1px;font-size:14px">
                                                                {{ $password }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left"
                                                style="font-size:0px;padding:10px 25px;word-break:break-word">
                                                <div
                                                    style="font-family:Poppins,sans-serif;font-size:14px;line-height:20px;text-align:left;color:#555555">
                                                    We will be happy to create a professional CV for you that will
                                                    maximize your chances to stand out among the other candidates within
                                                    International job market.
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left"
                                                style="font-size:0px;padding:10px 25px;word-break:break-word">
                                                <div
                                                    style="font-family:Poppins,sans-serif;font-size:14px;line-height:20px;text-align:left;color:#555555">
                                                    For any further queries, feel free to contact us via E-mail or
                                                    Online Chat.
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left"
                                                style="font-size:0px;padding:10px 25px;word-break:break-word">
                                                <div
                                                    style="font-family:Poppins,sans-serif;font-size:14px;line-height:20px;text-align:left;color:#555555">
                                                    Email us at <a href="mailto:{{ config('mail.from.address') }}"
                                                        target="_blank">{{ config('mail.from.address') }}</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center"
                                                style="font-size:0px;padding:10px 25px;word-break:break-word">
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                                    style="border-collapse:separate;line-height:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center" bgcolor="#380036" role="presentation"
                                                                style="border:none;border-radius:25px;padding:10px 25px;background:#380036"
                                                                valign="middle">
                                                                <a href="{{ config('app.tawkto_link') }}"
                                                                    style="background:#380036;color:white;font-family:Poppins,sans-serif;font-size:13px;font-weight:normal;line-height:120%;Margin:0;text-decoration:none;text-transform:none"
                                                                    target="_blank"
                                                                    data-saferedirecturl="https://www.google.com/url?q=https://tawk.to/chat/60211410a9a34e36b974e5f7/1eu0jcoph&amp;source=gmail&amp;ust=1654173159110000&amp;usg=AOvVaw2tAIv-2aS5uvX0j_76vb3z">
                                                                    Live Chat
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left"
                                                style="font-size:0px;padding:10px 25px;word-break:break-word">
                                                <div
                                                    style="font-family:Poppins,sans-serif;font-size:14px;line-height:20px;text-align:left;color:#555555">
                                                    <p>Have a wonderful day.</p>
                                                    <p>Best Regards,</p>
                                                    <p><strong style="color:#380036">{{ config('app.name') }}</strong></p>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="background:#ffffff;background-color:#ffffff;Margin:0px auto;max-width:600px">
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
                style="background:#ffffff;background-color:#ffffff;width:100%">
                <tbody>
                    <tr>
                        <td style="border-top:1px solid #380036;direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top">
                            <div style="background:#380036;font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                    style="vertical-align:top" width="100%">
                                    <tbody>
                                        <tr>
                                            <td align="center"
                                                style="font-size:0px;padding:10px 25px;word-break:break-word">
                                                <div
                                                    style="font-family:Poppins,sans-serif;font-size:13px;line-height:1;text-align:center;color:#ffffff">
                                                    © 2022,
                                                    <a href="{{route('home')}}" style="text-decoration:none;color:white" target="_blank">
                                                        {{config('app.name')}}
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
