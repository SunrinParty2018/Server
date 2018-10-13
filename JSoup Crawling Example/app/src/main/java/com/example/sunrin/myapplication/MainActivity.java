package com.example.sunrin.myapplication;

import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.method.ScrollingMovementMethod;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import org.jsoup.Jsoup;
import org.jsoup.nodes.Document;
import org.jsoup.nodes.Element;
import org.jsoup.select.Elements;

import java.io.IOException;

public class MainActivity extends AppCompatActivity {
    TextView textview1;
    TextView textview2;
    String body="";
    String auth="";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Button btn = findViewById(R.id.btn);
        textview1 = findViewById(R.id.text1);
        textview2 = findViewById(R.id.text2);
        textview1.setMovementMethod(new ScrollingMovementMethod());
        textview2.setMovementMethod(new ScrollingMovementMethod());
        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                JsoupAs jsoupas = new JsoupAs();
                jsoupas.execute();
            }
        });
    }
    private class JsoupAs extends AsyncTask<Void, Void, Void>
    {
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
        }
        protected Void doInBackground(Void... params)
        {
            try{
                Document doc = Jsoup.connect("http://pding397.iptime.org/ran_quote.php").get();
                Elements b = doc.select("div.body");
                for(Element e:b)
                {
                    body+=e.text().trim()+"\n";
                }
                Elements a = doc.select("div.auth");
                for(Element e:a)
                {
                    auth+=e.text().trim()+"\n";
                }
            } catch(IOException e)
            {
                e.printStackTrace();
            }
            return null;
        }
        @Override
        protected void onPostExecute(Void result)
        {
            textview1.setText(body);
            textview2.setText(auth);
        }
    }
}