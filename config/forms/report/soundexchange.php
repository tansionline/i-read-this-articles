<?php
return [
    'method' => 'post',

    'elements' => [

        'report_details' => [
            'markup',
            [
                'label' => _('Important Notes'),
                'markup' => '
                    <p>This report is intended for licensing in the United States only, for webcasters paying royalties via
                    SoundExchange. Learn more about the requirements for reporting and classification on the
                    <a href="https://www.soundexchange.com/service-provider/reporting-requirements/" target="_blank">
                        SoundExchange web site
                    </a>.</p>
                <ul>
                    <li>Radiolize assumes that your station fits SoundExchange Transmission Category A, "Eligible nonsubscription 
                    transmissions other than broadcast simulcasts and transmissions of non-music programming." If your
                    station does not fall within this category, update the transmission category field accordingly.
                    <li>The data collected by Radiolize meets the SoundExchange standard for Actual Total Performances (ATP)
                    by tracking unique listeners across all song plays. All other information is derived from the metadata of the
                    uploaded songs themselves, and may not be completely accurate.</li>
                    <li>Reporting requirements for SoundExchange may change at any time. Radiolize is non-commercial community-built
                    software and cannot guarantee that its reporting format will always be up-to-date.</li>
                    <li>You should always verify the report generated by Radiolize before sending it. In particular, either the ISRC
                    (International Standard Recording Code) or *both* the album and label are required for every row, and may not be 
                    provided in the song metadata. To locate an ISRC for a track, you should use 
                    <a href="https://isrc.soundexchange.com" target="_blank">SoundExchange\'s ISRC search tool</a>.</li>
                </ul>',
            ]
        ],

        'start_date' => [
            'text',
            [
                'type' => 'date',
                'label' => _('Report Start Date'),
                'required' => true,
            ]
        ],

        'end_date' => [
            'text',
            [
                'type' => 'date',
                'label' => _('Report End Date'),
                'required' => true,
            ]
        ],

        'submit' => [
            'submit',
            [
                'type' => 'submit',
                'label' => _('Generate Report'),
                'class' => 'btn btn-lg btn-primary',
            ]
        ],

    ],
];
