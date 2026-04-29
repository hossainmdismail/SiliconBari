@extends('layouts.app')

@section('title', 'User Manual')
@section('description', 'Project work log, available pages, admin areas, and step-by-step user guide.')

@section('page_styles')
    <style>
        .manual-page {
            padding: 80px 0;
        }

        .manual-card {
            max-width: 980px;
            margin: 0 auto;
            border: 1px solid rgba(148, 163, 184, 0.16);
            border-radius: 24px;
            background: #ffffff;
            padding: 32px;
            box-shadow: 0 20px 60px rgba(15, 23, 42, 0.08);
        }

        .manual-content {
            color: #16324f;
            line-height: 1.8;
        }

        .manual-content h1,
        .manual-content h2,
        .manual-content h3 {
            color: #0f172a;
            margin-top: 1.6em;
            margin-bottom: 0.55em;
        }

        .manual-content h1 {
            margin-top: 0;
            font-size: 2rem;
        }

        .manual-content h2 {
            font-size: 1.45rem;
        }

        .manual-content h3 {
            font-size: 1.1rem;
        }

        .manual-content p,
        .manual-content li {
            font-size: 1rem;
        }

        .manual-content ul,
        .manual-content ol {
            padding-left: 1.25rem;
        }

        .manual-content code {
            background: #eef6f8;
            color: #0f172a;
            border-radius: 6px;
            padding: 2px 6px;
        }

        .manual-content table {
            width: 100%;
            border-collapse: collapse;
            margin: 1rem 0 1.5rem;
        }

        .manual-content th,
        .manual-content td {
            border: 1px solid rgba(148, 163, 184, 0.2);
            padding: 0.8rem;
            text-align: left;
            vertical-align: top;
        }

        .manual-content th {
            background: #f8fbfc;
            color: #0f172a;
        }

        @media screen and (max-width: 767px) {
            .manual-page {
                padding: 48px 0;
            }

            .manual-card {
                padding: 20px;
                border-radius: 18px;
            }
        }
    </style>
@endsection

@section('content')
    <section class="manual-page">
        <div class="container">
            <div class="manual-card">
                <div class="manual-content">
                    {!! $manualHtml !!}
                </div>
            </div>
        </div>
    </section>
@endsection
