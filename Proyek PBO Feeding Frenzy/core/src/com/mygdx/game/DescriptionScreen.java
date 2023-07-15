package com.mygdx.game;

import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.Screen;
import com.badlogic.gdx.graphics.OrthographicCamera;
import com.badlogic.gdx.graphics.Texture;
import com.badlogic.gdx.utils.ScreenUtils;

public class DescriptionScreen implements Screen {
    final fishEater game;
    OrthographicCamera camera;
    private Texture deskripsi;


    public DescriptionScreen(final fishEater game){
        this.game=game;
        camera = new OrthographicCamera();
        camera.setToOrtho(false, 800, 480);
        deskripsi=new Texture(Gdx.files.internal("DESK.jpg"));
    }
    @Override
    public void show() {

    }
    @Override
    public void render(float delta) {
        ScreenUtils.clear(0, 0, 0.2f, 1);

        camera.update();
        game.batch.setProjectionMatrix(camera.combined);

        game.batch.begin();
        game.font.draw(game.batch, "Welcome to FishEater!!! ", 100, 150);
        game.font.draw(game.batch, "Welcome to FishEater!!! ", 100, 150);
        game.font.draw(game.batch, "Welcome to FishEater!!! ", 100, 150);
        game.font.draw(game.batch, "Welcome to FishEater!!! ", 100, 150);
        game.batch.draw(deskripsi,0,0);
        game.batch.end();

        if (Gdx.input.isTouched()) {
            game.setScreen(new GameScreen(game));
            dispose();
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
