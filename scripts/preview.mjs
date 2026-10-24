// Design preview only: PHP query expressions are represented by their default
// values. Real PHP rendering is checked by CI and again on Keliweb.
import http from 'node:http';
import{readFile}from'node:fs/promises';
import path from'node:path';
import{fileURLToPath}from'node:url';
const landing=process.cwd(),site=path.resolve('../bmg-website-live');
const address='http://127.0.0.1:8102';
function render(source){
 return source.replace(/^<\?php[\s\S]*?\?>\s*/,'')
 .replace(/<\?= \$robots \?>/g,'index, follow, max-image-preview:large')
 .replace(/<\?= \$year \?>/g,'2026')
 .replace(/<\?= \$personalized \? '' : 'hidden' \?>/g,'hidden')
 .replace(/<\?= \$personalized \? "Un’idea per \{\$hotel\}" : '' \?>/g,'')
 .replace(/<\?= \$contactName !== '' \? \$contactName \. ', ne parliamo\?' : 'Parliamo<br>del tuo progetto\.' \?>/g,'Parliamo<br>del tuo progetto.')
 .replace(/<\?= \$mailSubject \?>/g,'Un%20confronto%20con%20Be%20Marketing%20Group');
}
export{render};
if(path.resolve(process.argv[1]||'')===fileURLToPath(import.meta.url)){
 http.createServer(async(req,res)=>{try{
 const u=new URL(req.url,address),own=u.pathname.startsWith('/hospitality/');
 let rel=decodeURIComponent(own?u.pathname.slice('/hospitality'.length):u.pathname);
 if(rel.endsWith('/'))rel+=own?'index.php':'index.html';
 const root=own?landing:site,file=path.resolve(root,`.${rel}`);
 if(!file.startsWith(root+path.sep))throw Error('path');
 let body=await readFile(file);
 if(rel.endsWith('index.php'))body=Buffer.from(render(body.toString()));
 if(/\.(php|html)$/.test(rel))body=Buffer.from(body.toString().replace(/https:\/\/bemarketinggroup.it\//g,address+'/'));
 const ext=path.extname(file);res.writeHead(200,{'Content-Type':({'.php':'text/html','.html':'text/html','.css':'text/css','.js':'text/javascript','.svg':'image/svg+xml','.webp':'image/webp','.png':'image/png','.woff2':'font/woff2'})[ext]||'application/octet-stream','Cache-Control':'no-store','Content-Security-Policy':"script-src 'self'; connect-src 'none'; object-src 'none'"});res.end(body);
 }catch{res.writeHead(404);res.end('Not found');}}).listen(8102,'127.0.0.1',()=>console.log(address+'/hospitality/ — static PHP design preview, all outbound requests blocked.'));
}
