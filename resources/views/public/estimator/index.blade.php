@extends('layouts.app')

@section('title', 'Cost Estimator — Pratama Design Studio')
@section('meta_description', 'Estimasi biaya desain interior & fit-out dengan kalkulator online Pratama Design Studio.')

@section('head')
<style>
/* ── Page ── */
.ep { background: var(--paper-2); min-height: 100svh; }

/* ── Hero ── */
.ep-hero {
  background: var(--brown-deep);
  padding: clamp(90px, 11vw, 128px) var(--pad) clamp(36px, 4vw, 52px);
  position: relative; overflow: hidden;
}
.ep-hero::after {
  content: ''; position: absolute; inset: 0;
  background: radial-gradient(ellipse at 80% 50%, rgba(181,91,72,.12), transparent 60%);
  pointer-events: none;
}
.ep-hero-inner {
  max-width: var(--max); margin: 0 auto;
  display: grid; grid-template-columns: 1fr auto; align-items: end; gap: 32px;
  position: relative; z-index: 2;
}
.ep-eyebrow {
  font-size: 9px; letter-spacing: .22em; text-transform: uppercase;
  color: rgba(181,91,72,.9); font-weight: 600; margin-bottom: 14px;
  display: flex; align-items: center; gap: 10px;
}
.ep-eyebrow::before { content: ''; display: block; width: 20px; height: 1px; background: currentColor; }
.ep-hero h1 {
  margin: 0; font-family: var(--serif);
  font-size: clamp(36px, 5vw, 68px);
  line-height: .9; letter-spacing: -.03em;
  font-weight: 400; color: #f8f5f0;
}
.ep-hero h1 em { font-style: italic; color: #d98d88; }
.ep-hero-desc {
  max-width: 500px; font-size: 12px; color: rgba(255,255,255,.42);
  line-height: 1.7; margin-top: 14px;
}
.ep-breadcrumb {
  font-size: 9px; letter-spacing: .1em; text-transform: uppercase;
  color: rgba(255,255,255,.28); display: flex; align-items: center; gap: 7px;
}
.ep-breadcrumb a { color: inherit; transition: color .2s; }
.ep-breadcrumb a:hover { color: rgba(255,255,255,.6); }

/* ── Tool Body ── */
.ep-body { padding: 0 var(--pad) clamp(48px, 6vw, 72px); }
.ep-body-inner {
  max-width: var(--max); margin: 0 auto;
  display: grid; grid-template-columns: 1fr 1fr;
  gap: 1px; background: var(--line);
  border: 1px solid var(--line); margin-top: -1px;
}
.ep-col { background: var(--paper); padding: clamp(26px, 3vw, 40px); }
.ep-col-right { background: var(--card-bg); display: flex; flex-direction: column; }

/* ── Column Header ── */
.ep-col-label {
  font-size: 8px; letter-spacing: .22em; text-transform: uppercase;
  color: var(--muted); font-weight: 600;
  padding-bottom: 16px; border-bottom: 1px solid var(--line);
  margin-bottom: 26px;
  display: flex; align-items: center; justify-content: space-between;
}
.ep-col-label-num {
  font-family: var(--serif); font-size: 15px;
  color: var(--accent); font-weight: 400; letter-spacing: 0;
}

/* ── Fields ── */
.ep-field { margin-bottom: 26px; }
.ep-field:last-child { margin-bottom: 0; }
.ep-label {
  display: block; font-size: 8px; letter-spacing: .18em; text-transform: uppercase;
  font-weight: 600; color: var(--muted); margin-bottom: 10px;
}
.ep-hint { font-size: 10px; color: var(--muted); margin-top: 6px; }

.ep-select-wrap { position: relative; }
.ep-select {
  -webkit-appearance: none; appearance: none;
  width: 100%; padding: 9px 26px 9px 0;
  background: transparent; border: none; border-bottom: 1px solid var(--line);
  font-size: 13px; color: var(--text-heading);
  font-family: var(--serif); outline: none; cursor: pointer; border-radius: 0;
  transition: border-color .2s;
}
.ep-select:focus { border-bottom-color: var(--accent); }
.ep-select-wrap::after {
  content: ''; position: absolute; right: 3px; top: 42%;
  width: 5px; height: 5px;
  border-right: 1px solid var(--muted); border-bottom: 1px solid var(--muted);
  transform: rotate(45deg); pointer-events: none;
}

.ep-input-wrap { position: relative; }
.ep-input {
  width: 100%; padding: 9px 36px 9px 0;
  background: transparent; border: none; border-bottom: 1px solid var(--line);
  font-size: 20px; color: var(--text-heading);
  font-family: var(--serif); letter-spacing: -.02em;
  outline: none; border-radius: 0; transition: border-color .2s;
}
.ep-input:focus { border-bottom-color: var(--accent); }
.ep-input::placeholder { color: var(--muted); opacity: .35; }
.ep-input-unit {
  position: absolute; right: 0; bottom: 10px;
  font-size: 9px; letter-spacing: .1em; color: var(--muted); font-weight: 600;
  text-transform: uppercase; pointer-events: none;
}

/* ── Quality Selector ── */
.ep-quality-grid { display: flex; gap: 6px; }
.ep-quality-label { flex: 1; cursor: pointer; }
.ep-quality-label input { position: absolute; opacity: 0; width: 0; height: 0; }
.ep-quality-btn {
  display: flex; flex-direction: column; align-items: center; justify-content: center;
  gap: 3px; padding: 11px 8px;
  border: 1px solid var(--line); background: transparent;
  transition: all .2s cubic-bezier(.2,.8,.2,1); cursor: pointer;
}
.ep-quality-btn:hover { border-color: var(--accent); }
.ep-quality-btn.is-active { background: var(--text-heading); border-color: var(--text-heading); }
.ep-quality-name {
  font-size: 7px; letter-spacing: .14em; text-transform: uppercase;
  font-weight: 600; color: var(--muted); transition: color .2s;
}
.ep-quality-btn.is-active .ep-quality-name { color: var(--paper); }
.ep-quality-mult {
  font-family: var(--serif); font-size: 14px; color: var(--text-heading);
  letter-spacing: -.01em; transition: color .2s;
}
.ep-quality-btn.is-active .ep-quality-mult { color: var(--paper); }

/* ── Toggle ── */
.ep-toggle-row {
  display: flex; align-items: center; gap: 12px; cursor: pointer;
  padding: 14px 0 0; margin-top: 4px; border-top: 1px solid var(--line);
}
.ep-toggle { position: relative; flex-shrink: 0; }
.ep-toggle input { position: absolute; opacity: 0; width: 0; height: 0; }
.ep-toggle-track {
  display: block; width: 34px; height: 19px; border-radius: 99px;
  background: var(--line); border: 1px solid var(--line);
  transition: background .2s, border-color .2s;
}
.ep-toggle input:checked ~ .ep-toggle-track { background: var(--text-heading); border-color: var(--text-heading); }
.ep-toggle-thumb {
  position: absolute; top: 3px; left: 3px;
  width: 13px; height: 13px; border-radius: 50%;
  background: #fff; box-shadow: 0 1px 3px rgba(0,0,0,.2);
  transition: transform .2s cubic-bezier(.2,.8,.2,1); pointer-events: none;
}
.ep-toggle input:checked ~ .ep-toggle-thumb { transform: translateX(15px); }
.ep-toggle-text { display: flex; flex-direction: column; gap: 1px; }
.ep-toggle-label { font-size: 11px; font-weight: 600; color: var(--text-heading); }
.ep-toggle-sub { font-size: 9px; color: var(--muted); }

/* ── Result Panel ── */
.ep-result {
  flex: 1; display: flex; flex-direction: column;
  border-bottom: 1px solid var(--line);
  padding: clamp(26px, 3vw, 40px);
}
.ep-placeholder {
  flex: 1; display: flex; flex-direction: column;
  align-items: center; justify-content: center;
  gap: 12px; padding: 28px 20px; text-align: center; min-height: 180px;
}
.ep-placeholder-icon {
  width: 38px; height: 38px; border: 1px solid var(--line);
  display: flex; align-items: center; justify-content: center; color: var(--muted);
}
.ep-placeholder p { margin: 0; font-size: 11px; color: var(--muted); line-height: 1.65; max-width: 170px; }

.ep-result-inner { display: flex; flex-direction: column; }
.ep-result-label {
  font-size: 8px; letter-spacing: .22em; text-transform: uppercase;
  color: var(--muted); font-weight: 600; margin-bottom: 5px;
}
.ep-total-range {
  font-family: var(--serif);
  font-size: clamp(22px, 3vw, 34px);
  line-height: 1; letter-spacing: -.025em;
  color: var(--text-heading); margin-bottom: 20px;
}
.ep-total-range .ep-dash {
  font-family: var(--sans); font-size: .5em; color: var(--muted); margin: 0 6px; vertical-align: middle;
}

.ep-summary { display: flex; flex-direction: column; border-top: 1px solid var(--line); margin-bottom: 18px; }
.ep-summary-row {
  display: flex; justify-content: space-between; align-items: baseline;
  padding: 7px 0; border-bottom: 1px solid var(--line); font-size: 10px;
}
.ep-summary-row:last-child { border-bottom: none; }
.ep-summary-row span:first-child { color: var(--muted); }
.ep-summary-row span:last-child { font-weight: 600; color: var(--text-heading); }

.ep-permm2 {
  display: grid; grid-template-columns: 1fr 1fr;
  gap: 1px; background: var(--line); border: 1px solid var(--line); margin-bottom: 18px;
}
.ep-permm2-cell { background: var(--paper-2); padding: 10px 13px; }
.ep-permm2-cell .cell-label {
  font-size: 7px; letter-spacing: .12em; text-transform: uppercase;
  color: var(--muted); display: block; margin-bottom: 3px; font-weight: 600;
}
.ep-permm2-cell .cell-val {
  font-family: var(--serif); font-size: 15px; color: var(--text-heading);
  letter-spacing: -.01em; display: block;
}

.ep-cta-btn {
  display: flex; align-items: center; justify-content: center; gap: 9px;
  width: 100%; padding: 12px 18px;
  background: var(--text-heading); color: var(--paper);
  font-size: 9px; letter-spacing: .16em; text-transform: uppercase; font-weight: 700;
  border: none; cursor: pointer; text-decoration: none;
  transition: opacity .2s, transform .2s;
}
.ep-cta-btn:hover { opacity: .84; transform: translateY(-1px); color: var(--paper); }

/* ── Info blocks ── */
.ep-info {
  padding: clamp(18px, 2vw, 28px) clamp(26px, 3vw, 40px);
  border-bottom: 1px solid var(--line);
}
.ep-info:last-child { border-bottom: none; }
.ep-info-title {
  display: flex; align-items: center; gap: 7px;
  font-size: 8px; letter-spacing: .22em; text-transform: uppercase;
  font-weight: 600; color: var(--accent); margin-bottom: 12px;
}

.ep-disclaimer-list { margin: 0; padding: 0; list-style: none; display: flex; flex-direction: column; gap: 6px; }
.ep-disclaimer-list li {
  font-size: 10.5px; color: var(--muted); line-height: 1.6;
  padding-left: 14px; position: relative;
}
.ep-disclaimer-list li::before { content: '—'; position: absolute; left: 0; color: var(--coral); }
.ep-disclaimer-list strong { color: var(--text-heading); font-weight: 600; }

.ep-guide-rows { display: flex; flex-direction: column; }
.ep-guide-row {
  display: flex; justify-content: space-between; align-items: baseline;
  padding: 7px 0; border-bottom: 1px solid var(--line); font-size: 10.5px; gap: 12px;
}
.ep-guide-row:first-child { border-top: 1px solid var(--line); }
.ep-guide-row:last-child { border-bottom: none; }
.ep-guide-row span:first-child { color: var(--muted); }
.ep-guide-row span:last-child { font-family: var(--serif); font-size: 11px; color: var(--text-heading); white-space: nowrap; }

/* ── CTA Section ── */
.ep-cta {
  background: var(--brown-deep);
  padding: clamp(48px, 6vw, 80px) var(--pad);
  text-align: center; position: relative; overflow: hidden;
}
.ep-cta::before {
  content: ''; position: absolute; inset: 0;
  background: radial-gradient(ellipse at 50% 110%, rgba(181,91,72,.15), transparent 60%);
  pointer-events: none;
}
.ep-cta-inner { position: relative; z-index: 2; max-width: 480px; margin: 0 auto; }
.ep-cta-eyebrow {
  font-size: 8px; letter-spacing: .22em; text-transform: uppercase;
  color: rgba(255,255,255,.32); font-weight: 600; margin-bottom: 12px;
}
.ep-cta h2 {
  margin: 0 0 10px; font-family: var(--serif);
  font-size: clamp(26px, 3.8vw, 48px);
  line-height: .92; letter-spacing: -.03em; font-weight: 400; color: #f8f5f0;
}
.ep-cta p { margin: 0 0 28px; font-size: 12px; color: rgba(255,255,255,.38); line-height: 1.7; }
.ep-cta-btns { display: flex; align-items: center; justify-content: center; gap: 10px; flex-wrap: wrap; }
.ep-btn-light {
  display: inline-flex; align-items: center; gap: 8px; padding: 12px 28px;
  background: #fff; color: #24211d;
  font-size: 9px; letter-spacing: .16em; text-transform: uppercase; font-weight: 700;
  text-decoration: none; transition: opacity .2s, transform .2s;
}
.ep-btn-light:hover { opacity: .88; transform: translateY(-1px); color: #24211d; }
.ep-btn-ghost {
  display: inline-flex; align-items: center; gap: 8px; padding: 11px 28px;
  border: 1px solid rgba(255,255,255,.18); color: rgba(255,255,255,.55);
  font-size: 9px; letter-spacing: .16em; text-transform: uppercase; font-weight: 700;
  text-decoration: none; transition: all .2s;
}
.ep-btn-ghost:hover { border-color: rgba(255,255,255,.44); color: #fff; }

/* ── Responsive ── */
@media (max-width: 840px) {
  .ep-body-inner { grid-template-columns: 1fr; }
  .ep-hero-inner { grid-template-columns: 1fr; }
  .ep-breadcrumb { display: none; }
  .ep-body { padding-top: 0; }
}
@media (max-width: 480px) {
  .ep-col, .ep-result, .ep-info { padding: 20px 16px; }
  .ep-quality-grid { flex-direction: column; }
  .ep-cta-btns { flex-direction: column; width: 100%; }
  .ep-btn-light, .ep-btn-ghost { width: 100%; justify-content: center; }
}
</style>
@endsection

@section('content')
<div class="ep">

  {{-- ── Hero ── --}}
  <section class="ep-hero">
    <div class="ep-hero-inner">
      <div>
        <p class="ep-eyebrow">Kalkulator Biaya</p>
        <h1>Cost <em>Estimator</em></h1>
        <p class="ep-hero-desc">Hitung estimasi awal biaya desain interior & fit-out Anda. Hasil bersifat perkiraan — anggaran final ditentukan melalui survei dan BQ.</p>
      </div>
      <nav class="ep-breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span>/</span>
        <span>Cost Estimator</span>
      </nav>
    </div>
  </section>

  {{-- ── Tool ── --}}
  <section class="ep-body">
    <div class="ep-body-inner">

      {{-- Left: Form --}}
      <div class="ep-col">
        <div class="ep-col-label">
          <span>Data Proyek</span>
          <span class="ep-col-label-num">01</span>
        </div>

        {{-- Jenis Layanan --}}
        <div class="ep-field">
          <label class="ep-label" for="est_service_type">Jenis Layanan</label>
          <div class="ep-select-wrap">
            <select id="est_service_type" class="ep-select" onchange="calculate()">
              <option value="">— Pilih Jenis Layanan —</option>
              <optgroup label="Residential">
                <option value="full_house"     data-min="2500000" data-max="5000000">Full Interior (Rumah / Apartemen)</option>
                <option value="kitchen_set"    data-min="3000000" data-max="6000000">Kitchen Set</option>
                <option value="bedroom"        data-min="2000000" data-max="4000000">Bedroom Set</option>
                <option value="living_room"    data-min="1500000" data-max="3500000">Living Room</option>
              </optgroup>
              <optgroup label="Commercial">
                <option value="fnb"            data-min="4000000" data-max="8000000">F&amp;B / Café / Restaurant</option>
                <option value="office"         data-min="3000000" data-max="6000000">Office Interior</option>
                <option value="booth"          data-min="5000000" data-max="9000000">Booth / Exhibition</option>
              </optgroup>
              <optgroup label="Exterior">
                <option value="exterior_house" data-min="1500000" data-max="3000000">Fasad / Exterior Rumah</option>
              </optgroup>
            </select>
          </div>
          <p class="ep-hint">Harga per m² berdasarkan jenis layanan</p>
        </div>

        {{-- Luas Area --}}
        <div class="ep-field">
          <label class="ep-label" for="est_area">Luas Area</label>
          <div class="ep-input-wrap">
            <input type="number" id="est_area" min="1" step="0.5"
                   placeholder="0" oninput="calculate()"
                   class="ep-input">
            <span class="ep-input-unit">m²</span>
          </div>
        </div>

        {{-- Kualitas Material --}}
        <div class="ep-field">
          <label class="ep-label">Kualitas Material</label>
          <div class="ep-quality-grid">
            @foreach([
              ['economy',  'Economy',  '×0.8'],
              ['standard', 'Standard', '×1.0'],
              ['premium',  'Premium',  '×1.4'],
            ] as [$val, $lbl, $mult])
            <label class="ep-quality-label">
              <input type="radio" name="est_quality" value="{{ $val }}"
                     onchange="calculate()"
                     {{ $val === 'standard' ? 'checked' : '' }}>
              <div class="ep-quality-btn {{ $val === 'standard' ? 'is-active' : '' }}" data-value="{{ $val }}">
                <span class="ep-quality-name">{{ $lbl }}</span>
                <span class="ep-quality-mult">{{ $mult }}</span>
              </div>
            </label>
            @endforeach
          </div>
        </div>

        {{-- Fee Desain --}}
        <label class="ep-toggle-row">
          <span class="ep-toggle">
            <input type="checkbox" id="incl_design_fee" onchange="calculate()" checked>
            <span class="ep-toggle-track"></span>
            <span class="ep-toggle-thumb"></span>
          </span>
          <span class="ep-toggle-text">
            <span class="ep-toggle-label">Sertakan fee desain &amp; pengawasan</span>
            <span class="ep-toggle-sub">Est. 10–15% dari biaya konstruksi</span>
          </span>
        </label>
      </div>

      {{-- Right: Results + info --}}
      <div class="ep-col-right">

        {{-- Result --}}
        <div class="ep-result">
          <div class="ep-col-label">
            <span>Estimasi Biaya</span>
            <span class="ep-col-label-num">02</span>
          </div>

          <div id="result-placeholder" class="ep-placeholder">
            <div class="ep-placeholder-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <rect x="4" y="2" width="16" height="20" rx="2"/><line x1="8" y1="10" x2="16" y2="10"/><line x1="8" y1="14" x2="16" y2="14"/>
              </svg>
            </div>
            <p>Lengkapi form di sebelah kiri untuk melihat estimasi biaya.</p>
          </div>

          <div id="result-content" class="ep-result-inner" style="display:none;">
            <p class="ep-result-label">Estimasi Biaya Total</p>
            <div class="ep-total-range">
              <span id="est-min">Rp 0</span>
              <span class="ep-dash">—</span>
              <span id="est-max">Rp 0</span>
            </div>

            <div class="ep-summary">
              <div class="ep-summary-row"><span>Jenis Layanan</span><span id="summary-service">—</span></div>
              <div class="ep-summary-row"><span>Luas Area</span><span id="summary-area">—</span></div>
              <div class="ep-summary-row"><span>Kualitas</span><span id="summary-quality">—</span></div>
            </div>

            <div class="ep-permm2">
              <div class="ep-permm2-cell">
                <span class="cell-label">Min / m²</span>
                <span class="cell-val" id="est-per-min">—</span>
              </div>
              <div class="ep-permm2-cell">
                <span class="cell-label">Maks / m²</span>
                <span class="cell-val" id="est-per-max">—</span>
              </div>
            </div>

            <a href="{{ route('consultation.create') }}" class="ep-cta-btn">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M20 2H4C2.9 2 2 2.9 2 4V22L6 18H20C21.1 18 22 17.1 22 16V4C22 2.9 21.1 2 20 2ZM9 11H7V9H9V11ZM13 11H11V9H13V11ZM17 11H15V9H17V11Z"/></svg>
              Konsultasi untuk Anggaran Akurat
            </a>
          </div>
        </div>

        {{-- Disclaimer --}}
        <div class="ep-info">
          <div class="ep-info-title">
            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            Catatan Penting
          </div>
          <ul class="ep-disclaimer-list">
            <li>Hasil kalkulasi adalah <strong>perkiraan awal</strong> — bukan penawaran resmi.</li>
            <li>Harga final ditentukan setelah <strong>survei lokasi dan penyusunan BQ</strong>.</li>
            <li>Biaya dipengaruhi spesifikasi material, kondisi lokasi, dan scope pekerjaan.</li>
            <li>Untuk estimasi akurat, lakukan konsultasi dan survei bersama tim kami.</li>
          </ul>
        </div>

        {{-- Price guide --}}
        <div class="ep-info">
          <div class="ep-info-title">
            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
            Range Harga per m² (Referensi)
          </div>
          <div class="ep-guide-rows">
            @foreach([
              ['Full Interior (Rumah / Apt.)', 'Rp 2.5 — 5 Jt / m²'],
              ['Kitchen Set',                  'Rp 3 — 6 Jt / m²'],
              ['F&B / Café / Restaurant',      'Rp 4 — 8 Jt / m²'],
              ['Office Interior',              'Rp 3 — 6 Jt / m²'],
              ['Booth / Exhibition',           'Rp 5 — 9 Jt / m²'],
            ] as [$lbl, $range])
            <div class="ep-guide-row">
              <span>{{ $lbl }}</span>
              <span>{{ $range }}</span>
            </div>
            @endforeach
          </div>
        </div>

      </div>
    </div>
  </section>

  {{-- ── CTA ── --}}
  <section class="ep-cta">
    <div class="ep-cta-inner">
      <p class="ep-cta-eyebrow">Konsultasi</p>
      <h2>Butuh Anggaran yang Lebih Akurat?</h2>
      <p>Hubungi kami untuk survei lokasi dan penyusunan RAB yang rinci, disesuaikan kebutuhan dan budget Anda.</p>
      <div class="ep-cta-btns">
        <a href="{{ route('consultation.create') }}" class="ep-btn-light">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M20 2H4C2.9 2 2 2.9 2 4V22L6 18H20C21.1 18 22 17.1 22 16V4C22 2.9 21.1 2 20 2Z"/></svg>
          Konsultasi &amp; Estimasi
        </a>
        <a href="https://wa.me/6282213641995?text=Halo%2C%20saya%20ingin%20konsultasi%20estimasi%20biaya%20interior."
           target="_blank" rel="noopener noreferrer" class="ep-btn-ghost">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
          Chat WhatsApp
        </a>
      </div>
    </div>
  </section>

</div>
@endsection

@section('scripts')
<script>
  const qualityMultipliers = { economy: 0.80, standard: 1.00, premium: 1.40 };
  const qualityLabels      = { economy: 'Economy (×0.80)', standard: 'Standard (×1.00)', premium: 'Premium (×1.40)' };
  const designFeeRate      = 0.125;

  function formatRp(v) {
    if (v >= 1_000_000_000) return 'Rp ' + (v / 1_000_000_000).toFixed(2) + ' M';
    if (v >= 1_000_000)     return 'Rp ' + (v / 1_000_000).toFixed(1) + ' Juta';
    return 'Rp ' + v.toLocaleString('id-ID');
  }

  function calculate() {
    const serviceEl = document.getElementById('est_service_type');
    const areaEl    = document.getElementById('est_area');
    const qualityEl = document.querySelector('input[name="est_quality"]:checked');
    const inclFeeEl = document.getElementById('incl_design_fee');

    const opt     = serviceEl.options[serviceEl.selectedIndex];
    const area    = parseFloat(areaEl.value) || 0;
    const quality = qualityEl ? qualityEl.value : 'standard';
    const inclFee = inclFeeEl.checked;

    const minPerM2 = parseInt(opt.dataset.min) || 0;
    const maxPerM2 = parseInt(opt.dataset.max) || 0;
    const qMult    = qualityMultipliers[quality] || 1;
    const feeRate  = inclFee ? (1 + designFeeRate) : 1;

    const totalMin = minPerM2 * area * qMult * feeRate;
    const totalMax = maxPerM2 * area * qMult * feeRate;

    const placeholder = document.getElementById('result-placeholder');
    const content     = document.getElementById('result-content');

    if (!minPerM2 || area <= 0) {
      placeholder.style.display = '';
      content.style.display     = 'none';
      return;
    }

    document.getElementById('summary-service').textContent = opt.text || '—';
    document.getElementById('summary-area').textContent    = area + ' m²';
    document.getElementById('summary-quality').textContent = qualityLabels[quality];
    document.getElementById('est-min').textContent         = formatRp(Math.round(totalMin));
    document.getElementById('est-max').textContent         = formatRp(Math.round(totalMax));
    document.getElementById('est-per-min').textContent     = formatRp(Math.round(minPerM2 * qMult));
    document.getElementById('est-per-max').textContent     = formatRp(Math.round(maxPerM2 * qMult));

    placeholder.style.display = 'none';
    content.style.display     = '';
  }

  document.querySelectorAll('input[name="est_quality"]').forEach(radio => {
    radio.addEventListener('change', () => {
      document.querySelectorAll('.ep-quality-btn').forEach(btn => {
        btn.classList.toggle('is-active', btn.dataset.value === radio.value);
      });
    });
  });
</script>
@endsection
