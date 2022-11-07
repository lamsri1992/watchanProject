<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class projectController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function list()
    {
        $list = DB::table('tb_projects')
                ->join('tb_hos','tb_hos.h_id','tb_projects.pj_hos')
                ->join('tb_budget','tb_budget.bud_id','tb_projects.pj_budget')
                ->join('tb_project_status','tb_project_status.p_status_id','tb_projects.pj_status')
                ->get();
        $stat = DB::table('tb_project_status')->get();
        return view('plan.list',['list'=>$list,'stat'=>$stat]);
    }

    public function list_show($id)
    {
        $list = DB::table('tb_projects')
                ->join('tb_hos','tb_hos.h_id','tb_projects.pj_hos')
                ->join('tb_budget','tb_budget.bud_id','tb_projects.pj_budget')
                ->join('tb_project_status','tb_project_status.p_status_id','tb_projects.pj_status')
                ->where('tb_projects.pj_id',$id)
                ->first();
        $stat = DB::table('tb_project_status')->get();
        return view('plan.list_show',['list'=>$list,'stat'=>$stat]);
    }

    public function list_status(Request $request,$id)
    {
        DB::table('tb_projects')->where('pj_id',$id)->update(
            [
                "pj_status" => $request->get('pj_status'),
            ]
        );
        $stat = DB::table('tb_project_status')->where('p_status_id',$request->get('pj_status'))->first();
        return back()->with('success','อัพเดตสถานะสำเร็จ : '.$stat->p_status_name);
    }

    public function file_update(Request $request,$id)
    {
        $word  = $request->file('docFile');
        $pdf  = $request->file('pdfFile');
        $nword  = $request->file('docFile')->getClientOriginalName();
        $npdf  = $request->file('pdfFile')->getClientOriginalName();
        $word->move('plan/word', $nword);
        $pdf->move('plan/pdf', $npdf);
        $data = DB::table('tb_projects')->select('pj_word','pj_pdf')->where('pj_id',$id)->first();
        $aword = $data->pj_word.",".$nword;
        $apdf = $data->pj_pdf.",".$npdf;
        // dd($nword,$npdf,$data,$aword,$apdf);
        DB::table('tb_projects')->where('pj_id',$id)->update([
            "pj_word" => $aword,
            "pj_pdf" => $apdf,
        ]);
        return back()->with('success','อัพโหลดไฟล์สำเร็จ');
    }
}
