@extends('layouts.site')

@section('title', 'GDPR Compliance')
@section('meta_description', 'Tribute Energy GDPR compliance — your data protection rights under EU regulation.')

@section('content')

    <section class="relative pt-32 pb-16 border-b border-gray-200 bg-white">
        <div class="relative z-10 max-w-4xl mx-auto px-5 lg:px-8">
            <div class="section-label mb-4">Compliance</div>
            <h1 class="font-bebas text-6xl lg:text-8xl leading-none">
                GDPR<br>
                <span class="text-gradient">COMPLIANCE</span>
            </h1>
            <div class="divider mt-4 mb-5"></div>
            <p class="text-gray-600 text-sm">Last updated: <strong class="text-gray-900">January 1, {{ date('Y') }}</strong></p>
        </div>
    </section>

    <section class="py-16 max-w-4xl mx-auto px-5 lg:px-8">
        <div class="space-y-8 text-gray-600 text-sm leading-relaxed" data-aos="fade-up">
            <p>At Tribute Energy, we are committed to protecting your personal data and respecting your privacy. This page outlines your rights under the General Data Protection Regulation (GDPR) and how we comply with EU data protection laws.</p>

            <div>
                <h2 class="font-bebas text-3xl text-gradient mb-4">YOUR RIGHTS UNDER GDPR</h2>
                <div class="space-y-4">
                    <div class="flex items-start gap-4 bg-gray-50 border border-gray-200 p-5">
                        <div class="w-10 h-10 rounded-lg bg-[#FF6B00]/10 border border-[#FF6B00]/20 flex items-center justify-center flex-shrink-0"><i class="fas fa-eye text-[#FF6B00]"></i></div>
                        <div><h3 class="font-rajdhani font-700 text-sm text-gray-900 mb-1">Right to Access</h3><p class="text-xs">You can request a copy of all personal data we hold about you at any time.</p></div>
                    </div>
                    <div class="flex items-start gap-4 bg-gray-50 border border-gray-200 p-5">
                        <div class="w-10 h-10 rounded-lg bg-[#FF6B00]/10 border border-[#FF6B00]/20 flex items-center justify-center flex-shrink-0"><i class="fas fa-edit text-[#FF6B00]"></i></div>
                        <div><h3 class="font-rajdhani font-700 text-sm text-gray-900 mb-1">Right to Rectification</h3><p class="text-xs">You can request that we correct any inaccurate or incomplete data.</p></div>
                    </div>
                    <div class="flex items-start gap-4 bg-gray-50 border border-gray-200 p-5">
                        <div class="w-10 h-10 rounded-lg bg-[#FF6B00]/10 border border-[#FF6B00]/20 flex items-center justify-center flex-shrink-0"><i class="fas fa-trash text-[#FF6B00]"></i></div>
                        <div><h3 class="font-rajdhani font-700 text-sm text-gray-900 mb-1">Right to Erasure</h3><p class="text-xs">You can request deletion of your personal data ("right to be forgotten").</p></div>
                    </div>
                    <div class="flex items-start gap-4 bg-gray-50 border border-gray-200 p-5">
                        <div class="w-10 h-10 rounded-lg bg-[#FF6B00]/10 border border-[#FF6B00]/20 flex items-center justify-center flex-shrink-0"><i class="fas fa-ban text-[#FF6B00]"></i></div>
                        <div><h3 class="font-rajdhani font-700 text-sm text-gray-900 mb-1">Right to Restrict Processing</h3><p class="text-xs">You can request that we limit how we use your data.</p></div>
                    </div>
                    <div class="flex items-start gap-4 bg-gray-50 border border-gray-200 p-5">
                        <div class="w-10 h-10 rounded-lg bg-[#FF6B00]/10 border border-[#FF6B00]/20 flex items-center justify-center flex-shrink-0"><i class="fas fa-file-export text-[#FF6B00]"></i></div>
                        <div><h3 class="font-rajdhani font-700 text-sm text-gray-900 mb-1">Right to Data Portability</h3><p class="text-xs">You can request your data in a machine-readable format to transfer to another service.</p></div>
                    </div>
                    <div class="flex items-start gap-4 bg-gray-50 border border-gray-200 p-5">
                        <div class="w-10 h-10 rounded-lg bg-[#FF6B00]/10 border border-[#FF6B00]/20 flex items-center justify-center flex-shrink-0"><i class="fas fa-times-circle text-[#FF6B00]"></i></div>
                        <div><h3 class="font-rajdhani font-700 text-sm text-gray-900 mb-1">Right to Object</h3><p class="text-xs">You can object to processing of your data for marketing purposes at any time.</p></div>
                    </div>
                </div>
            </div>

            <div>
                <h2 class="font-bebas text-3xl text-gradient mb-4">DATA WE COLLECT</h2>
                <p>We collect only the data necessary to provide our services: name, email address, shipping address, payment information, and basic browsing behavior. We do not collect sensitive personal data or special category data under Article 9 of the GDPR.</p>
            </div>

            <div>
                <h2 class="font-bebas text-3xl text-gradient mb-4">LAWFUL BASIS FOR PROCESSING</h2>
                <p>We process your data under the following lawful bases:</p>
                <ul class="space-y-2 mt-3">
                    <li class="flex items-start gap-3"><span class="text-[#FF6B00] mt-0.5">→</span><span><strong class="text-gray-700">Contract Performance:</strong> To fulfill orders and manage subscriptions.</span></li>
                    <li class="flex items-start gap-3"><span class="text-[#FF6B00] mt-0.5">→</span><span><strong class="text-gray-700">Consent:</strong> For marketing communications and optional cookies.</span></li>
                    <li class="flex items-start gap-3"><span class="text-[#FF6B00] mt-0.5">→</span><span><strong class="text-gray-700">Legitimate Interest:</strong> For analytics, fraud prevention, and site improvement.</span></li>
                    <li class="flex items-start gap-3"><span class="text-[#FF6B00] mt-0.5">→</span><span><strong class="text-gray-700">Legal Obligation:</strong> For tax and accounting compliance.</span></li>
                </ul>
            </div>

            <div>
                <h2 class="font-bebas text-3xl text-gradient mb-4">DATA RETENTION</h2>
                <p>We retain your data only as long as necessary: account data is kept until you delete your account, order data is retained for 7 years for tax purposes, and analytics data is anonymized after 26 months.</p>
            </div>

            <div>
                <h2 class="font-bebas text-3xl text-gradient mb-4">INTERNATIONAL DATA TRANSFERS</h2>
                <p>If you are located in the European Economic Area (EEA), your data may be transferred to and processed in the United States. We ensure adequate protection through Standard Contractual Clauses (SCCs) with all third-party data processors.</p>
            </div>

            <div>
                <h2 class="font-bebas text-3xl text-gradient mb-4">EXERCISING YOUR RIGHTS</h2>
                <p>To exercise any of your GDPR rights, please contact our Data Protection Officer:</p>
                <div class="bg-gray-50 border border-gray-200 p-5 mt-3 space-y-2">
                    <p class="text-sm"><i class="fas fa-envelope text-[#FF6B00] mr-2"></i><a href="mailto:privacy@tributeenergy.com" class="text-gray-900 hover:text-[#FF6B00]">privacy@tributeenergy.com</a></p>
                    <p class="text-sm"><i class="fas fa-map-pin text-[#FF6B00] mr-2"></i>Tribute Energy LLC, 123 Performance Drive, Austin, TX 78701, United States</p>
                </div>
                <p class="mt-4">We will respond to your request within 30 days. If you are unsatisfied with our response, you have the right to lodge a complaint with your local data protection authority.</p>
            </div>
        </div>
    </section>

@endsection
