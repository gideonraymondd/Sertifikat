package com.mygdx.game;
import com.badlogic.gdx.graphics.g2d.BitmapFont;
import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.Input;
import com.badlogic.gdx.Screen;
import com.badlogic.gdx.audio.Music;
import com.badlogic.gdx.audio.Sound;
import com.badlogic.gdx.graphics.Texture;
import com.badlogic.gdx.graphics.g2d.SpriteBatch;
import com.badlogic.gdx.math.MathUtils;
import com.badlogic.gdx.math.Rectangle;
import com.badlogic.gdx.utils.Array;
import com.badlogic.gdx.utils.ScreenUtils;
import com.badlogic.gdx.utils.TimeUtils;

import java.util.Iterator;

public class GameScreen implements Screen {
    final fishEater game;
    int jumlahmakan;
    SpriteBatch batch;
    Texture img;
    private Texture player;
    private Texture enemyLv1;
    private Texture enemyLv2;
    private Texture enemyLv3;
    private Rectangle playerHitbox;//hitbox ember
    private Sound eat;//efek sound jika memakan
    private Music seaMusic;//music background laut

    //array untuk musuh
    private Array<Rectangle> enemies;
    private Array<Rectangle> enemies2;
    private Array<Rectangle> enemies3;
    private long lastDropTime;

    //inisialisasi musuh
    Enemy enemylv1=new Enemy(42,64,620-42, MathUtils.random(0,800-64));
    Enemy enemylv2=new Enemy(46,64,620-46,MathUtils.random(0,800-64));
    Enemy enemylv3=new Enemy(35,64,620-35,MathUtils.random(0,800-64));

    public GameScreen(fishEater game) {
        this.game = game;

        batch = new SpriteBatch();
        //load gambar
        img = new Texture("sea3.jpg");
        player = new Texture(Gdx.files.internal("playerone.png"));
        enemyLv1=new Texture(Gdx.files.internal("enemylv1.png"));
        enemyLv2=new Texture(Gdx.files.internal("enemylv2.png"));
        enemyLv3=new Texture(Gdx.files.internal("enemylv3.png"));
        //music
        seaMusic = Gdx.audio.newMusic(Gdx.files.internal("background.mp3"));
        eat = Gdx.audio.newSound(Gdx.files.internal("makan.wav"));
        //run  music sebagai loop
        seaMusic.setLooping(true);
        seaMusic.play();
        //membuat hitbox untuk player
        playerHitbox = new Rectangle();
        playerHitbox.x = 800 / 2 - 75 / 2;
        playerHitbox.y = 20;
        playerHitbox.width = 75;
        playerHitbox.height = 62;
        //membuat array dan hitbox untuk ranindrop
        enemies=new Array<Rectangle>();
        enemies2=new Array<Rectangle>();
        enemies3=new Array<Rectangle>();

        spawnEnemy();

    }

    //method untuk mengisi array dengan enemy
    private void spawnEnemy() {
        //1
        Rectangle enemy = new Rectangle();
        enemy.x = 800-42;
        enemy.y = MathUtils.random(0, 800-64);
        enemy.width = 64;
        enemy.height = 42;
        enemies.add(enemy);
        //2
        Rectangle enemy2 = new Rectangle();
        enemy2.x = 800-46;
        enemy2.y = MathUtils.random(0, 800-64);
        enemy2.width = 64;
        enemy2.height = 46;
        enemies2.add(enemy2);
        //3
        Rectangle enemy3 = new Rectangle();
        enemy3.x = 800-35;
        enemy3.y = MathUtils.random(0, 800-64);
        enemy3.width = 64;
        enemy3.height = 35;
        enemies3.add(enemy3);
        lastDropTime = TimeUtils.nanoTime();

    }
    @Override
    public void show() {

    }

    @Override
    public void render(float delta) {
        ScreenUtils.clear(1, 0, 0, 1);

        game.batch.begin();
        //background
        game.batch.draw(img, 0, 0, Gdx.graphics.getWidth(),Gdx.graphics.getHeight());

        game.font.draw(game.batch,"Score: "+jumlahmakan,0,480);
        if(jumlahmakan>=15){
            game.font.draw(game.batch,"Upgrade ke lv2",0,450 );
        }
        if(jumlahmakan>=25){
            game.font.draw(game.batch,"Upgrade ke lv3",0,450 );
        }
        //gambar player
        game.batch.draw(player,playerHitbox.x,playerHitbox.y);
        //gambar enemy
        for(Rectangle enemy: enemies) {
            game.batch.draw(enemyLv1, enemy.x, enemy.y);
        }
        for(Rectangle enemy2: enemies2) {
            game.batch.draw(enemyLv2, enemy2.x, enemy2.y);
        }
        for(Rectangle enemy3: enemies3) {
            game.batch.draw(enemyLv3, enemy3.x, enemy3.y);
        }

        game.batch.end();

        //bikin biar bisa dengan keyboard
        if(Gdx.input.isKeyPressed(Input.Keys.LEFT)) playerHitbox.x -= 200 * Gdx.graphics.getDeltaTime();
        if(Gdx.input.isKeyPressed(Input.Keys.RIGHT)) playerHitbox.x += 200 * Gdx.graphics.getDeltaTime();
        if(Gdx.input.isKeyPressed(Input.Keys.DOWN)) playerHitbox.y -= 200 * Gdx.graphics.getDeltaTime();
        if(Gdx.input.isKeyPressed(Input.Keys.UP)) playerHitbox.y += 200 * Gdx.graphics.getDeltaTime();
        if(Gdx.input.isKeyPressed(Input.Keys.ESCAPE))game.setScreen(new MainMenuScreen(game));

        dispose();

        // biar ga keluar
        if(playerHitbox.x < 0) playerHitbox.x = 0;
        if(playerHitbox.x > 800 - 75) playerHitbox.x = 800 - 75;
        if(playerHitbox.y < 0) playerHitbox.y = 0;
        if(playerHitbox.y > 480 - 62) playerHitbox.y = 480 - 62;


        //timer untuk spawn enemy
        if(TimeUtils.nanoTime()-lastDropTime>1000000000)spawnEnemy();

        for (Iterator<Rectangle> iter = enemies.iterator(); iter.hasNext(); ) {
            Rectangle enemy = iter.next();
            enemy.x -= 200 * Gdx.graphics.getDeltaTime();
            if (enemy.y + 42 < 0) iter.remove();
            if (enemy.overlaps(playerHitbox)) {
                eat.play();
                iter.remove();
                jumlahmakan++;
            }
        }
        //level2
        for (Iterator<Rectangle> iter = enemies2.iterator(); iter.hasNext(); ) {
            Rectangle enemy2 = iter.next();
            enemy2.x -= 200 * Gdx.graphics.getDeltaTime();
            if (enemy2.y + 64 < 0) iter.remove();
            if (enemy2.overlaps(playerHitbox)&&jumlahmakan>=15) {
                eat.play();
                iter.remove();
                jumlahmakan++;
            }
            if(enemy2.overlaps(playerHitbox)&&jumlahmakan<=25) {
                game.setScreen(new AfterGameScreen(game));
            }
        }
        //level3
        for (Iterator<Rectangle> iter = enemies3.iterator();iter.hasNext(); ) {
            Rectangle enemy3 = iter.next();
            enemy3.x -= 200 * Gdx.graphics.getDeltaTime();
            if (enemy3.y + 35 < 0) iter.remove();
            if (enemy3.overlaps(playerHitbox)&&jumlahmakan>=25) {
                eat.play();
                iter.remove();
                jumlahmakan++;
            }
            if(enemy3.overlaps(playerHitbox)&&jumlahmakan<=25) {
                game.setScreen(new AfterGameScreen(game));
            }
        }
        if(jumlahmakan==50){
            game.setScreen(new AfterGameScreen(game));
        }
    }

    @Override
    public void resize(int width, int height) {

    }

    @Override
    public void pause() {

    }

    @Override
    public void resume() {

    }

    @Override
    public void hide() {

    }

    @Override
    public void dispose() {

    }
}
