import assert from'node:assert/strict';
import{readFile,access}from'node:fs/promises';
import{spawnSync}from'node:child_process';
import{runInNewContext}from'node:vm';
import{render}from'../scripts/preview.mjs';
const source=await readFile('index.php','utf8'),html=render(source),css=await readFile('assets/css/landing-editorial.css','utf8'),js=await readFile('assets/js/landing-editorial.js','utf8');
assert.ok(!html.includes('<?'),'Static preview handles all template expressions');
assert.equal((html.match(/<h1\b/g)||[]).length,1);assert.match(html,/rel="canonical" href="https:\/\/bemarketinggroup.it\/hospitality\/"/);
assert.equal((html.match(/data-case-photo\b/g)||[]).length,7);assert.equal((html.match(/data-case-dialog\b/g)||[]).length,1);
const form=html.match(/<form\b[\s\S]*?<\/form>/)[0];assert.match(form,/data-contact-form="bmg_hospitality_landing"/);
for(const name of ['name','email','message'])assert.match(form,new RegExp(`name="${name}"[^>]*required`));
assert.match(form,/name="service"/);assert.match(form,/data-turnstile/);assert.match(form,/name="website" tabindex="-1"/);assert.match(form,/informazioni\/privacy/);
assert.doesNotMatch(form,/name="company|name="company_url/);
for(const name of ['editorial-preview.css','editorial-design.css','editorial-navigation.js','editorial-gallery.js','contact-mail.js'])assert.ok(html.includes('https://bemarketinggroup.it/assets/'+(name.endsWith('.css')?'css/':'js/')+name));
assert.doesNotMatch(html,/fonts.googleapis|phosphor|assets\/js\/main.js|assets\/css\/style.css|giardino di Bellevue|giardino mediterraneo/i);
assert.match(css,/prefers-reduced-motion/);
for(const font of ['bodoni-moda-latin.woff2','bodoni-moda-latin-ext.woff2','dm-sans-latin.woff2','dm-sans-latin-ext.woff2'])await access('assets/fonts/'+font);
const state=query=>{
 const note={hidden:true},heading={},link={},scripts=[];
 const document={querySelector:s=>s==='[data-personal-note]'?note:s==='[data-contact-heading]'?heading:link,createElement:()=>({}),head:{append:s=>scripts.push(s)}};
 runInNewContext(js,{URLSearchParams,location:{search:query,hostname:'preview.test'},document,encodeURIComponent});return{note,heading,link,scripts};
};
const p=state('?hotel=Hotel%20Prova&nome=Anna');assert.equal(p.note.textContent,'Un’idea per Hotel Prova');assert.equal(p.heading.textContent,'Anna, ne parliamo?');assert.ok(p.link.href.includes('Hotel%20Prova'));assert.equal(p.scripts.length,0);
const hostile=state('?hotel=%3Cimg%20src%3Dx%20onerror%3Dalert(1)%3E&nome=%3Cscript%3E');assert.equal(hostile.note.textContent,'Un’idea per <img src=x onerror=alert(1)>');assert.equal(hostile.heading.textContent,'<script>, ne parliamo?');assert.equal(hostile.note.innerHTML,undefined);assert.equal(state('?hotel='+('x'.repeat(120))).note.textContent.length,102);
console.log('PASS: editorial shared assets, seven gallery photos, contact contract, font files, reduced motion, safe client personalization.');
const php=spawnSync('php',['-v'],{encoding:'utf8'});
if(php.error){assert.notEqual(process.env.REQUIRE_PHP,'1','PHP is required for deployment');console.log('SKIP: real PHP rendering unavailable locally; run REQUIRE_PHP=1 in a PHP environment.');}
else{
 for(const query of ['', 'hotel=Hotel+Prova&nome=Anna', 'hotel=%3Cscript%3Ealert(1)%3C%2Fscript%3E&nome=%22%3E%3Cimg+src%3Dx%3E', 'hotel%5B%5D=x&nome%5B%5D=x']){
  const r=spawnSync('php',['-r','parse_str($argv[1], $_GET); include "index.php";',query],{encoding:'utf8'});assert.equal(r.status,0,r.stderr);assert.equal(r.stderr,'');assert.ok(!r.stdout.includes('<?'));assert.doesNotMatch(r.stdout,/<script>alert\(1\)/);
  if(query==='hotel=Hotel+Prova&nome=Anna'){assert.ok(r.stdout.includes('Un’idea per Hotel Prova'));assert.ok(r.stdout.includes('Anna, ne parliamo?'));assert.ok(r.stdout.includes('content="noindex, follow"'));}
 }
 console.log('PASS: actual PHP default/personalized/hostile/array query rendering without warnings.');
}
