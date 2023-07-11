<div>
    <table align="center" style="font-weight:normal;border-collapse:collapse;border:0;margin-left:auto;margin-right:auto;padding:0;font-family:Arial,sans-serif;color:#555559;background-color:white;font-size:16px;line-height:26px;width:600px">
        <tbody>
            <tr>
                <td
                    style="border-collapse:collapse;border:1px solid #eeeff0;margin:0;padding:0;color:#555559;font-family:Arial,sans-serif;font-size:16px;line-height:26px">
                    <table
                        style="font-weight:normal;border-collapse:collapse;border:0;margin:0;padding:0;font-family:Arial,sans-serif">
                        <tbody>
                            <tr>
                                <td colspan="4" valign="top"
                                    style="border-collapse:collapse;border:0;margin:0;padding:0;color:#555559;font-family:Arial,sans-serif;font-size:16px;line-height:26px;background-color:#fff;border-bottom:4px solid #fb3232;text-align:center">
                                    <a href="{{route('home')}}" target="_blank">
                                        <img  src="{{ asset('imgs/cheapresumeLogo.png') }}" class="w-20" alt="{{env('APP_NAME', config('app.name'))}}" style="width:30%;" >
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" style="border-collapse:collapse;border:0;margin:0;padding:20px;color:#555559;font-family:Arial,sans-serif;font-size:16px;line-height:26px;vertical-align:top;background-color:white;border-top:none">
                                    <table style="font-weight:normal;border-collapse:collapse;border:0;margin:0;padding:0;font-family:Arial,sans-serif">
                                        <tbody>
                                            <tr>
                                                <td style="border-collapse:collapse;border:0;margin:0;padding:0;color:#555559;font-family:Arial,sans-serif;font-size:16px;line-height:26px">
                                                    <div>
                                                        # Order

                                                        {{env('APP_NAME', config('app.name'))}}

                                                        <br>
                                                        <br>
                                                        <strong>  Career Level : {{$order->carrer_level->name}}</strong>
                                                        <br>
                                                        <strong>  Service Category : {{$order->orderService->name}}</strong>
                                                        <br>
                                                        <strong>  Deadline  : {{$order->deadline->name}}</strong>
                                                        <br>
                                                        <strong>  Detail : {{$order->detail}}</strong>
                                                        <br>
                                                        <strong>  Name : {{$order->name}}</strong>
                                                        <br>
                                                        <strong>  Email : {{$order->email}}</strong>
                                                        <br>
                                                        <strong>  Phone : {{$order->phone}}</strong>
                                                        <br>
                                                        <strong>  Total Price : {{$order->total_price}}</strong>
                                                        <br>
                                                        <br>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr bgcolor="#fff" style="border-top:4px solid #fb3232">
                                <td valign="top" style="border-collapse:collapse;border:0;margin:0;padding:0;color:#555559;font-family:Arial,sans-serif;font-size:16px;line-height:26px;background:#fff;text-align:center">
                                    <table style="font-weight:normal;border-collapse:collapse;border:0;margin:0;padding:0;font-family:Arial,sans-serif">
                                        <tbody>
                                            <tr>
                                                <td align="center" valign="middle"
                                                    style="border-collapse:collapse;border:0;margin:0;padding:20px;color:#555559;font-family:Arial,sans-serif;font-size:12px;line-height:16px;vertical-align:middle;text-align:center;width:580px">
                                                    <div>
                                                        <b>cheapresumewriter.com</b>
                                                        <br> © 2018 - 2022
                                                        <br>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</div>
